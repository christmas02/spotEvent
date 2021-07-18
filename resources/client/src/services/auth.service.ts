import { CommonService } from "@/services/Common.service";

import {
    ILogin,
    ILoginResponse,
    IRegister,
    IRegisterResponse,
    ISaveImage,
    ISaveImageResponse,
    IUpadteProfile,
    IUpadteProfileResponse,
    IUpdatePassword,
    IUpdatePasswordResponse,
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
import {
    IListComment,
    IResultListComment,
    IResultListCommentResponse,
    ISendComment,
    ISendCommentResponse
} from "@/interfaces/comment.interface";

export class AuthService extends CommonService {
    async initLogin(credentials: ILogin): Promise<ILoginResponse> {
        try {
            const { data } = await this.client.post(
                "/authentification/login",
                credentials
            );
            return data;
        } catch (e) {
            // console.log(e.response.data);
            return {
                statu: 0,
                favoris: [],
                role: 0,
                lien: "",
                user: (null as unknown) as IUser,
                message: ""
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
            if (e.response.status === 422)
                return {
                    statu: 0,
                    role: "0",
                    message: "Email ou numero de telephone deja utilisé"
                };

            return { statu: 0, role: "0", message: "Une erreur est survenue" };
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
    async upadteProfile(body: IUpadteProfile): Promise<IUpadteProfileResponse> {
        try {
            const {
                data
            }: { data: IUpadteProfileResponse } = await this.client.post(
                "upadteProfile",
                body
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: "Modification non enregistrée"
            } as IUpadteProfileResponse;
        }
    }
    async updatePassword(
        body: IUpdatePassword
    ): Promise<IUpdatePasswordResponse> {
        try {
            const {
                data
            }: { data: IUpdatePasswordResponse } = await this.client.post(
                "updatePassword",
                body
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: "Modification du mot de passe non prise en compte"
            } as IUpdatePasswordResponse;
        }
    }
    async saveImage(body: ISaveImage): Promise<ISaveImageResponse> {
        try {
            const {
                data
            }: { data: ISaveImageResponse } = await this.client.post(
                "saveImage",
                body
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: "Erreur lors du changement de l'avatar"
            } as ISaveImageResponse;
        }
    }
    async sendComment(body: ISendComment): Promise<ISendCommentResponse> {
        try {
            const {
                data
            }: { data: ISendCommentResponse } = await this.client.post(
                "save_commentaire",
                body
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: "Erreur lors del'nevoi du commentaire"
            } as ISendCommentResponse;
        }
    }
    async listComment(body: IListComment): Promise<IResultListCommentResponse> {
        try {
            const {
                data
            }: { data: IResultListCommentResponse } = await this.client.post(
                "liste_commentaire",
                body
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: "Erreur lors de la recuperation des commentaires"
            } as IResultListCommentResponse;
        }
    }
}
