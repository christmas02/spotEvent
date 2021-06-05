import { IUser } from "@/interfaces/auth.interfaces";
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
    id(state: IAuthState): number {
        return state.user ? state.user.id : 0;
    },
    isFavorite(state: IAuthState): (providerId: number) => boolean {
        return (providerId: number) => {
            return state.favorites.some((favorite) => favorite.id_prestataire == providerId);
        }
    }
};
