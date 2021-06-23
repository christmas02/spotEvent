import { CommonService } from "@/services/Common.service";

import {
    ILogin,
    ILoginResponse,
    IRegister,
    IRegisterResponse,
    IUser
} from "@/interfaces/auth.interfaces";
import {
    IConversationId,
    IListeConversationsResponse,
    IListeMessagesResponse,
    IsendingMessage,
    IsendingMessageResponse,
    IUserId
} from "@/interfaces/liste-conversations.interfaces";

export class AuthService extends CommonService {
    async initLogin(credentials: ILogin): Promise<ILoginResponse> {
        try {
            const { data } = await this.client.post(
                "/authentification/login",
                credentials
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                favoris: [],
                role: 0,
                lien: "",
                user: (null as unknown) as IUser
            };
        }
    }

    async initRegister(credentials: IRegister): Promise<IRegisterResponse> {
        try {
            const { data } = await this.client.post(
                "/authentification/register",
                credentials
            );
            return data;
        } catch (e) {
            console.log(e);
            return { statu: 0, role: "0" };
        }
    }
    async getRooms(body: IUserId): Promise<IListeConversationsResponse> {
        try {
            const {
                data
            }: { data: IListeConversationsResponse } = await this.client.post(
                "liste_conversation",
                body
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: "Aucune conversation disponible"
            } as IListeConversationsResponse;
        }
    }
    async getMessages(body: IConversationId): Promise<IListeMessagesResponse> {
        try {
            const {
                data
            }: { data: IListeMessagesResponse } = await this.client.post(
                "liste_message",
                body
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: "Aucune message disponible",
                messages: []
            } as IListeMessagesResponse;
        }
    }
    async sendingMessage(
        body: IsendingMessage
    ): Promise<IsendingMessageResponse> {
        try {
            const {
                data
            }: { data: IsendingMessageResponse } = await this.client.post(
                "message",
                body
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: "Message non enregistré"
            } as IsendingMessageResponse;
        }
    }
}
