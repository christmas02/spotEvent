export interface IProvider {
    id: number;
    name: string;
    email: string;
    phone: number;
    role: number;
    confirmation_token?: any;
    email_verified_at: string;
    created_at: string;
    updated_at: string;
    name_entreprise: string;
    id_user?: number;
    prestation: string;
    path_icone: string;
}

export interface ISlider {
    id: number;
    id_user: number;
    path: string;
    created_at: string;
    updated_at: string;
}

export interface ProvidersResponse {
    statu: number;
    listPrestataire: IProvider[];
}

export interface ISlidersResponse {
    statu: number;
    listPrestataire: ISlider[];
}
