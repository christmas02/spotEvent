import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";
import { ISearchForm } from "@/interfaces/app-services.interfaces";
import { ICommune } from "@/interfaces/commune.interface";

export interface IBenefitState {
    benefits: Benefit[];
    categories: ICategory[];
    communes: ICommune[];
    estimates: IEstimate[];
    providers: IProvider[];
    choiceCategorie: String;
    choiceEstimateMin: String;
    choiceEstimateMax: String;
    prestations: ISearchForm;
    choiceLocalisation: String;
    statusFormUpdateProfil: Boolean;
    statusFormUpdatePhoto: Boolean;
    statusFormUpdatePassword: Boolean;
    loading: Boolean;
    isFilter: Boolean;
}

export interface FilterPayload {
    prestation: String;
    min: String;
    max: String;
    localisation?: String;
}
