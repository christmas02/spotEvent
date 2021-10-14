import { ICommuneSearch } from "./../interfaces/commune.interface";
import {
    IContentsResponse,
    IEstimation,
    ISearchPrestataire,
    ISearchPrestataireResponse
} from "./../interfaces/app-services.interfaces";
import { CommonService } from "./Common.service";
import {
    IClick,
    IPhoneOrWaClick,
    IClickResponse,
    IContactForm,
    IContactFormResponse,
    IPrestationsSearchFormResponse,
    ISearchForm,
    IIdPrestation
} from "@/interfaces/app-services.interfaces";

export class AppService extends CommonService {
    async filterByCategory(
        body: IIdPrestation
    ): Promise<IPrestationsSearchFormResponse> {
        try {
            const {
                data
            }: {
                data: IPrestationsSearchFormResponse;
            } = await this.client.post("filtreCategorie", body);

            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: ""
            } as IPrestationsSearchFormResponse;
        }
    }
    async filterByEstimation(
        body: IEstimation
    ): Promise<IPrestationsSearchFormResponse> {
        try {
            const {
                data
            }: {
                data: IPrestationsSearchFormResponse;
            } = await this.client.post("filtreEstimation", body);

            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: ""
            } as IPrestationsSearchFormResponse;
        }
    }
    async filterByCommune(
        body: ICommuneSearch
    ): Promise<IPrestationsSearchFormResponse> {
        try {
            const {
                data
            }: {
                data: IPrestationsSearchFormResponse;
            } = await this.client.post("filtreCommune", body);

            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: ""
            } as IPrestationsSearchFormResponse;
        }
    }
    async getPrestationsSearchForm(
        body: ISearchForm
    ): Promise<IPrestationsSearchFormResponse> {
        try {
            const {
                data
            }: {
                data: IPrestationsSearchFormResponse;
            } = await this.client.post("recherche", body);

            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: ""
            } as IPrestationsSearchFormResponse;
        }
    }
    async getPrestataireSearchForm(
        body: ISearchPrestataire
    ): Promise<ISearchPrestataireResponse> {
        try {
            const {
                data
            }: {
                data: ISearchPrestataireResponse;
            } = await this.client.post("recherchePrestataire", body);
            // data.statu = 1;
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: ""
            } as ISearchPrestataireResponse;
        }
    }
    async contactForm(body: IContactForm): Promise<IContactFormResponse> {
        try {
            const {
                data
            }: { data: IContactFormResponse } = await this.client.post(
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
                statu: 0
            } as IClickResponse;
        }
    }
    async phoneOrWaClick(body: IPhoneOrWaClick): Promise<any> {
        try {
            const { data }: { data: IPhoneOrWaClick } = await this.client.post(
                "sendSms",
                body
            );

            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0
            } as any;
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
                statu: 0
            } as IClickResponse;
        }
    }

    async contents(): Promise<IContentsResponse> {
        try {
            const { data }: { data: IContentsResponse } = await this.client.get(
                "Liste_contenus"
            );

            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                message: "Erreur lors de la recuperation des textes"
            } as IContentsResponse;
        }
    }
}
