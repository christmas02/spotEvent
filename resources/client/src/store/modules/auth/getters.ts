import { IUser } from "@/interfaces/auth.interfaces";
import { IResultListComment } from "@/interfaces/comment.interface";
import { IFavorite } from "@/interfaces/favorite.interface";
import {
    IConversation,
    IMessage
} from "@/interfaces/liste-conversations.interfaces";
import { IAuthState } from "./interfaces/state.interface";

export default {
    isConnected(state: IAuthState): boolean {
        return state.auth;
    },
    user(state: IAuthState): IUser {
        return state.user;
    },
    modal(state: IAuthState): boolean {
        return state.modal;
    },
    favorites(state: IAuthState): IFavorite[] {
        return state.favorites;
    },
    favoritesModal(state: IAuthState): boolean {
        return state.favoritesModal;
    },
    isComment(state: IAuthState): boolean {
        return state.isComment;
    },
    workerSpaceModal(state: IAuthState): boolean {
        return state.workerSpaceModal;
    },
    id(state: IAuthState): number {
        return state.user ? state.user.id : 0;
    },

    isFavorite(state: IAuthState): (providerId: number) => boolean {
        return (providerId: number) => {
            return state.favorites.some(
                favorite => favorite.id_prestataire == providerId
            );
        };
    },
    rooms(state: IAuthState): IConversation[] {
        return state.rooms;
    },
    messages(state: IAuthState): IMessage[] {
        return state.messages;
    },
    idBenefitToChat(state: IAuthState): number {
        return state.idBenefitToChat;
    },
    listComment(state: IAuthState): IResultListComment[] {
        return state.listComment;
    }
};
