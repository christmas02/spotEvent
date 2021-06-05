import { IUser } from "@/interfaces/auth.interfaces";
import { IFavorite } from "@/interfaces/favorite.interface";

export interface IAuthState {
    user: IUser;
    auth: boolean;
    modal: boolean;
    favorites: IFavorite[]
}
