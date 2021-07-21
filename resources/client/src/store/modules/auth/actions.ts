import { IUpadteProfile, IUser } from "@/interfaces/auth.interfaces";
import { IListComment } from "@/interfaces/comment.interface";
import {
    IConversationId,
    IsendingMessage,
    IUserId
} from "@/interfaces/liste-conversations.interfaces";
import { AuthService } from "@/services/auth.service";
import { IAuthState } from "./interfaces/state.interface";

export default {
    async upadteProfile(
        {
            commit,
            state,
            getters
        }: { commit: any; state: IAuthState; getters: any },
        { force = false, myUser = {} as IUpadteProfile }
    ): Promise<void> {
        const userService = new AuthService();
        console.log(myUser);

        const result = await userService.upadteProfile(myUser);

        if (result.statu == 1) {
            console.log(result);
            const img = getters("user").path_user;
            const auth_user = new Object() as IUser;
            console.log(img);

            // commit("updateUser", );
        } else {
            console.log("erreur");
            // commit("upadteProfile", []);
        }
    },
    async getListComment(
        { commit, state }: { commit: any; state: IAuthState },
        { force = false, prestataire = {} as IListComment }
    ): Promise<void> {
        const userService = new AuthService();


        // console.log(state.user.id);
        const result = await userService.listComment(prestataire);

        if (result.statu == 1) {
            
        for (let index = 0; index < result.resultat.length; index++) {
            // result.resultat[index].id_prestataire = result.resultat[index].id_prestataire.toString();
            // result.resultat[index].id_user = result.resultat[index].id_user.toString();
            // result.resultat[index].vote = result.resultat[index].vote.toString();
            

            // result.resultat[index].id_prestataire = parseInt(result.resultat[index].id_prestataire);
            // result.resultat[index].id_user = parseInt(result.resultat[index].id_user);
            // result.resultat[index].vote = parseInt(result.resultat[index].vote);

        }
            commit("updateListComment", result.resultat);
        } else {
            commit("updateListComment", []);
        }
    },
    async getRooms(
        { commit, state }: { commit: any; state: IAuthState },
        force = false
    ): Promise<void> {
        const userService = new AuthService();
        const myUser = new Object() as IUserId;
        myUser.id_user = state.user.id;

        console.log(state.user.id);
        const result = await userService.getRooms({ id_user: state.user.id });

        if (result.statu == 1) {
            commit("updateRooms", result.conversation);
        } else {
            commit("updateRooms", []);
        }
    },
    async getMessages(
        { commit, state }: { commit: any; state: IAuthState },
        { force = false, conversation = {} as IConversationId }
    ): Promise<void> {
        const userService = new AuthService();

        const result = await userService.getMessages(conversation);

        if (result.statu == 1) {
            // console.log(result, "mes resultats");
            // for (let index = 0; index < result.messages.length; index++) {

                            
            //     result.messages[index].id_emmetteur = result.messages[index].id_emmetteur.toString();
            //     result.messages[index].conversation = result.messages[index].conversation.toString();


                // result.messages[index].id_emmetteur = parseInt(result.messages[index].id_emmetteur);
                // result.messages[index].conversation = parseInt(result.messages[index].conversation);
            // }
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
