import { CommonService } from "@/services/Common.service";

import {
    ILogin,
    ILoginResponse,
    IRegister,
    IRegisterResponse,
    IUser
} from "@/interfaces/auth.interfaces";

export class AuthService extends CommonService {
    async initLogin(credentials: ILogin): Promise<ILoginResponse> {
        try {
            const { data } = await this.client.post(
                "/authentification/login",
                credentials
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                favoris: [],
                role: 0,
                user: (null as unknown) as IUser
            };
        }
    }

    async initRegister(credentials: IRegister): Promise<IRegisterResponse> {
        try {
            const { data } = await this.client.post(
                "/authentification/register",
                credentials
            );
            return data;
        } catch (e) {
            console.log(e);
            return { statu: 0, role: "0" };
        }
    }
}
