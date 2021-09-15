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
    actif_whatsapp: number;
    actif_phone: number;
    estimation_min?: number;
    estimation_max?: number;
    actif_chat?: number;
    nbre_image?: number;
}

export interface IFindPrestataire {
    statu: number;
    findPrestataire: IfiltreEstimation;
}

export interface IfiltreEstimation {
    id: number;
    id_user: number;
    name: string;
    localisation: string;
    id_prestations: number;
    presentation: string;
    description: string;
    detail_localisation: string;
    path_img: string;
    phone_service: string;
    phone2_service?: any;
    phone_whastapp?: any;
    lien_facebook?: any;
    lien_instagram?: any;
    email_service: string;
    estimation_min: number;
    estimation_max: number;
    statu_fiche: number;
    messagerie: number;
    actif_chat: number;
    position: number;
    favoris: number;
    actif_phone: number;
    actif_whatsapp: number;
    nbre_image: number;
    created_at: string;
    updated_at: string;
}
export interface BeneftsResponse {
    statu: number;
    listPrestation: Benefit[];
}
