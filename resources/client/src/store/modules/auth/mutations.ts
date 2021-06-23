import { ILoginResponse, IUser } from "@/interfaces/auth.interfaces";
import { IFavorite } from "@/interfaces/favorite.interface";
import {
    IConversation,
    IMessage
} from "@/interfaces/liste-conversations.interfaces";
import { Message } from "vue-advanced-chat";
import { IAuthState } from "./interfaces/state.interface";

export default {
    login(state: IAuthState, result: ILoginResponse): void {
        state.auth = true;
        state.user = result.user;
        state.favorites = result.favoris;
    },
    logout(state: IAuthState): void {
        state.auth = false;
        state.user = (null as unknown) as IUser;
    },
    authModalStatus(state: IAuthState, val: boolean): void {
        state.modal = val;
    },
    authFavoritesModalStatus(state: IAuthState, val: boolean): void {
        state.favoritesModal = val;
    },
    authWorkerSpaceModalStatus(state: IAuthState, val: boolean): void {
        state.workerSpaceModal = val;
    },

    updateFavoritesList(state: IAuthState, val: IFavorite[]): void {
        state.favorites = val;
    },
    updateRooms(state: IAuthState, val: IConversation[]): void {
        state.rooms = val;
    },
    updateMessages(state: IAuthState, val: IMessage[]): void {
        state.messages = val;
    },
    updateIdBenefitToChat(state: IAuthState, val: number): void {
        state.idBenefitToChat = val;
    }
};
