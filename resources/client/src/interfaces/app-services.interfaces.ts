import { Benefit } from "./benefit.interface";
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
