import { IUser } from "@/interfaces/auth.interfaces";

export interface IAuthState {
    user: IUser;
    auth: boolean;
    modal: boolean;
}
