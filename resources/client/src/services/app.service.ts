import { CommonService } from "./Common.service";
import { IClick, IClickResponse, IContactForm, IContactFormResponse } from "@/interfaces/app-services.interfaces";

export class AppService extends CommonService {
    async contactForm(body: IContactForm): Promise<IContactFormResponse> {
        try {
            const { data }: { data: IContactFormResponse } = await this.client.post(
                "demande",
                body
            );

            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                messages: ""
            } as IContactFormResponse;
        }
    }

    async phoneClick(body: IClick): Promise<IClickResponse> {
        try {
            const { data }: { data: IClickResponse } = await this.client.post(
                "clicphone",
                body
            );

            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
            } as IClickResponse;
        }
    }

    async benefitClick(body: IClick): Promise<IClickResponse> {
        try {
            const { data }: { data: IClickResponse } = await this.client.post(
                "clicfiche",
                body
            );

            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
            } as IClickResponse;
        }
    }
}

