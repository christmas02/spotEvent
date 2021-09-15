import { IFindPrestataire } from "./../interfaces/benefit.interface";
import {
    BeneftsResponse,
    IfiltreEstimation
} from "@/interfaces/benefit.interface";
import { CommonService } from "./Common.service";
import { ICategoryResponse } from "@/interfaces/category.interface";
import { ICommuneResponse } from "@/interfaces/commune.interface";
import { IEstimateResponse } from "@/interfaces/estimation.interface";
import {
    IAutocompleteProvidersResponse,
    ISlidersResponse,
    ProvidersResponse
} from "@/interfaces/provider.interface";
import { IClick } from "@/interfaces/app-services.interfaces";
import { IFavoriteResponse } from "@/interfaces/favorite.interface";
// import {
//     IListeCnversationsResponse,
//     IConversation,
//     IUser
// } from "@/interfaces/liste-conversations.interfaces";

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
    async getCommunes(): Promise<ICommuneResponse> {
        try {
            const { data }: { data: ICommuneResponse } = await this.client.get(
                "Liste_commune"
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0
            } as ICommuneResponse;
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

    async toggleFavorite(body: IClick): Promise<IFavoriteResponse> {
        try {
            const {
                data
            }: { data: IFavoriteResponse } = await this.client.post(
                "favoris",
                body
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0,
                listeFavoris: []
            } as IFavoriteResponse;
        }
    }

    async autocompleteProviders(
        text: string
    ): Promise<IAutocompleteProvidersResponse> {
        try {
            const {
                data
            }: {
                data: IAutocompleteProvidersResponse;
            } = await this.client.post("/recherchePrestataire", {
                name: text
            });
            return data;
        } catch (e) {
            console.log(e);
            return {
                message: "Erreur",
                resultat: [],
                statu: 0
            } as IAutocompleteProvidersResponse;
        }
    }

    async findPrestataire(text: string): Promise<IFindPrestataire> {
        try {
            const { data }: { data: IFindPrestataire } = await this.client.post(
                "/find_prestataire",
                {
                    name: text
                }
            );
            return data;
        } catch (e) {
            console.log(e);
            return {
                statu: 0
            } as IFindPrestataire;
        }
    }
}
