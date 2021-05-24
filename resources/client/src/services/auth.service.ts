import {CommonService} from "@/services/Common.service";
import {ILogin, IRegister, IRegisterResponse,} from "@/interfaces/auth.interfaces";
import {AUTH_KEY} from "@/common/constants";





export class AuthService extends CommonService {

    async initLogin(credentials: ILogin) {
        try {
            const { data } = await this.client.post("/authentification/login", credentials);
            if (data.statu != 0) {
                localStorage.setItem(AUTH_KEY, "connected");
            }
            return data
        } catch (e) {
            console.log(e)
            return { statu: 0 }
        }
    }

    async initRegister(credentials: IRegister): Promise<IRegisterResponse> {
        try {
            const { data } = await this.client.post("/authentification/register", credentials);
            return data
        } catch (e) {
            console.log(e)
            return { statu: 0, role: "0" }
        }
    }

}
