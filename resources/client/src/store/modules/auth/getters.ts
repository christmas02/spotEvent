import { IUser } from "@/interfaces/auth.interfaces";
import { IAuthState } from "./interfaces/state.interface";

export default {
    isConnected(state: IAuthState): boolean {
        return state.auth;
    },
    user(state: IAuthState): IUser {
        return state.user;
    }
};
