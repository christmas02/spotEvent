export interface Benefit {
    id: number;
    id_user: number;
    name: string;
    localisation: string;
    id_prestations: number;
    description: string;
    detail_localisation: string;
    path_img: string;
    phone_service: string;
    phone2_service: string;
    phone_whastapp: string;
    lien_facebook: string;
    lien_instagram: string;
    email_service: string;
    id_estimation: number;
    statu_fiche: number;
    messagerie: number;
    position: number;
    favoris?: number;
    created_at: string;
    updated_at: string;
    prestation: string;
    presentation: string;
    path_icone: string;
}

export interface BeneftsResponse {
    statu: number;
    listPrestation: Benefit[];
}
