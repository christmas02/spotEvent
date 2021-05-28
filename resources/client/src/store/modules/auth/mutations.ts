import { IUser } from "@/interfaces/auth.interfaces";
import { IAuthState } from "./interfaces/state.interface";

export default {
    login(state: IAuthState, user: IUser): void {
        state.auth = true;
        state.user = user;
    },
    logout(state: IAuthState): void {
        state.auth = false;
        state.user = (null as unknown) as IUser;
    }
};
