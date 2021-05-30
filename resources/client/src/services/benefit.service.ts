import { BeneftsResponse } from "@/interfaces/benefit.interface";
import { CommonService } from "./Common.service";
import { ICategoryResponse } from "@/interfaces/category.interface";
import { IEstimateResponse } from "@/interfaces/estimation.interface";
import {
    ISlidersResponse,
    ProvidersResponse
} from "@/interfaces/provider.interface";

export class BenefitService extends CommonService {
    async getAll(): Promise<BeneftsResponse> {
        try {
            const { data }: { data: BeneftsResponse } = await this.client.get(
                "liste_prestation"
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                listPrestation: []
            } as BeneftsResponse;
        }
    }

    async getProviders(): Promise<ProvidersResponse> {
        try {
            const { data }: { data: ProvidersResponse } = await this.client.get(
                "liste_prestataire"
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                listPrestataire: []
            } as ProvidersResponse;
        }
    }

    async getCategories(): Promise<ICategoryResponse> {
        try {
            const { data }: { data: ICategoryResponse } = await this.client.get(
                "liste_categorie"
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                listCategorie: []
            } as ICategoryResponse;
        }
    }

    async getSliders(id_user: number): Promise<ISlidersResponse> {
        try {
            const { data }: { data: ISlidersResponse } = await this.client.post(
                "liste_slides",
                {
                    id_user
                }
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                listPrestataire: []
            } as ISlidersResponse;
        }
    }

    async getEstimates(): Promise<IEstimateResponse> {
        try {
            const { data }: { data: IEstimateResponse } = await this.client.get(
                "liste_estimation"
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                listCategorie: []
            } as IEstimateResponse;
        }
    }
}