import { IUser } from "@/interfaces/auth.interfaces";
import { IAuthState } from "./interfaces/state.interface";

const state = (): IAuthState => ({
    auth: false,
    user: (null as unknown) as IUser,
    modal: false,
    favoritesModal: false,
    workerSpaceModal: false,
    favorites: [],
    rooms: [],
    messages: [],
    idBenefitToChat: (null as unknown) as number
});

export default state;
