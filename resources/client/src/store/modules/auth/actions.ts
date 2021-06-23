import {
    IConversationId,
    IsendingMessage,
    IUserId
} from "@/interfaces/liste-conversations.interfaces";
import { AuthService } from "@/services/auth.service";
import { IAuthState } from "./interfaces/state.interface";

export default {
    async getRooms(
        { commit, state }: { commit: any; state: IAuthState },
        force = false
    ): Promise<void> {
        const userService = new AuthService();
        const myUser = new Object() as IUserId;
        myUser.id_user = state.user.id;

        console.log(state.user.id);
        // const result = await userService.getRooms(myUser);
        // const result = await userService.getRooms({ id_user: 13 });
        const result = await userService.getRooms({ id_user: state.user.id });

        if (result.statu == 1) {
            commit("updateRooms", result.conversation);
            // commit("store", result.listPrestation);
            // console.log(result.conversation);
        } else {
            // commit("updateRooms", result.conversation);
            alert("erreur lors de la recuperation des rooms");
        }
    },
    async getMessages(
        { commit, state }: { commit: any; state: IAuthState },
        { force = false, conversation = {} as IConversationId }
    ): Promise<void> {
        const userService = new AuthService();

        const result = await userService.getMessages(conversation);

        if (result.statu == 1) {
            await commit("updateMessages", result.messages);
            // console.log(result);
        } else {
            alert("erreur lors de la recuperation des messages");
        }
    },
    async sendingMessage(
        { commit, state }: { commit: any; state: IAuthState },
        { force = false, sending = {} as IsendingMessage }
    ): Promise<void> {
        const userService = new AuthService();

        const result = await userService.sendingMessage(sending);

        if (result.statu == 1) {
            // await commit("updateSendingMessage", result.messages);
            console.log("message envoyé");

            // console.log(result);
        } else {
            alert("erreur lors de la recuperation des messages");
        }
    }
};
