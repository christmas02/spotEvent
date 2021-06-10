import { ILoginResponse, IUser } from "@/interfaces/auth.interfaces";
import { IFavorite } from "@/interfaces/favorite.interface";
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

    updateFavoritesList(state: IAuthState, val: IFavorite[]): void {
        state.favorites = val;
    }
};
