export interface Benefit {
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
    phone2_service: string;
    phone_whastapp: string;
    lien_facebook: string;
    lien_instagram: string;
    email_service: string;
    estimation_min: string;
    estimation_max: string;
    statu_fiche: number;
    messagerie: number;
    actif_chat: number;
    position: number;
    favoris: number;
    actif_phone: number;
    actif_whatsapp: number;
    nbre_image: number;
    video: number;
    agenda: number;
    created_at: string;
    updated_at: string;
    prestation: string;
    path_icone: string;
}

export interface IFindPrestataire {
    statu: number;
    findPrestataire: IfiltreEstimation;
    video?: Video;
    agenda?: Agenda;
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
    phone2_service: string;
    phone_whastapp: string;
    lien_facebook: string;
    lien_instagram: string;
    email_service: string;
    estimation_min: string;
    estimation_max: string;
    statu_fiche: number;
    messagerie: number;
    actif_chat: number;
    position: number;
    favoris: number;
    actif_phone: number;
    actif_whatsapp: number;
    nbre_image: number;
    video?: number;
    agenda?: number;
    created_at: string;
    updated_at: string;
    prestation: string;
    path_icone: string;
}

export interface BeneftsResponse {
    statu: number;
    listPrestation: Benefit[];
}

////////////////////

// export interface FindPrestataire {
//     id: number;
//     id_user: number;
//     name: string;
//     localisation: string;
//     id_prestations: number;
//     presentation: string;
//     description: string;
//     detail_localisation: string;
//     path_img: string;
//     phone_service: string;
//     phone2_service: string;
//     phone_whastapp: string;
//     lien_facebook: string;
//     lien_instagram: string;
//     email_service: string;
//     estimation_min: string;
//     estimation_max: string;
//     statu_fiche: number;
//     messagerie: number;
//     actif_chat: number;
//     position: number;
//     favoris: number;
//     actif_phone: number;
//     actif_whatsapp: number;
//     nbre_image: number;
//     video: number;
//     agenda: number;
//     created_at: string;
//     updated_at: string;
//     prestation: string;
//     path_icone: string;
// }

export interface Video {
    active_video: number;
    video: string;
}

export interface Event {
    date_event: string;
}

export interface Agenda {
    active_agenda: number;
    agenda: Event[];
}
