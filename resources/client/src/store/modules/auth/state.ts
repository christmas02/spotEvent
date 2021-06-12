import { IUser } from "@/interfaces/auth.interfaces";
import { IAuthState } from "./interfaces/state.interface";

const state = (): IAuthState => ({
    auth: false,
    user: (null as unknown) as IUser,
    modal: false,
    favoritesModal: false,
    workerSpaceModal: false,
    favorites: []
});

export default state;
