import { IUser } from "@/interfaces/auth.interfaces";
import { IFavorite } from "@/interfaces/favorite.interface";
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
    id(state: IAuthState): number {
        return state.user ? state.user.id : 0;
    },
    isFavorite(state: IAuthState): (providerId: number) => boolean {
        return (providerId: number) => {
            return state.favorites.some(
                favorite => favorite.id_prestataire == providerId
            );
        };
    }
};
