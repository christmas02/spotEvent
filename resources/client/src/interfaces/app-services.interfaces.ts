import { Benefit, IfiltreEstimation } from "./benefit.interface";
export interface IContactForm {
    id_pres: string;
    name: string;
    phone: string;
    email: string;
    message: string;
}

export interface IPrestationsSearchFormResponse {
    statu: number;
    message: string;
    resultat: Benefit[];
}

export interface ISearchForm {
    id_prestation: String;
    localisation: String;
    estmation_max: String;
    estmation_min: String;
}

export interface IIdPrestation {
    id_prestation: String;
}
export interface IEstimation {
    estmation_max: number;
    estmation_min: number;
}

export interface IContactFormResponse {
    statu: number;
    messages: string;
}

export interface IClick {
    id_user: string;
    id_pres: string;
}

export interface IClickResponse {
    statu: number;
}
export interface ISearchPrestataireResponse {
    statu: number;
    message: string;
    resultat: IResultForm;
}
export interface ISearchPrestataire {
    mane: string;
}

export interface IResultForm {
    vote: number;
    votant: number;
    id_prestataire: number;
    name_entreprise: string;
    prestation: string;
    path_icone: string;
    path_user?: any;
    id_fiche: number;
}

export type Page = "accueil" | "apropos" | "contact";

export interface Content {
    id: number;
    titre_contenus: string;
    contenus: string;
    page: Page;
    created_at: string;
    updated_at: string;
}
export interface IContentsResponse {
    statu: number;
    message: string;
    listContenue: Content[];
}
export interface IPhoneOrWaClick {
    id_utilisateur: number;
    id_prestataire: number;
    type_bottom: string;
}

export interface IListPub {
    id: number;
    path: string;
    page: string;
    position: number;
    created_at: string;
    updated_at: string;
}

export interface IListPubResponse {
    statu: number;
    message: string;
    listContenue: IListPub[];
}
