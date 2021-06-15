export interface IFavorite {
    id: number;
    id_user: number;
    id_prestataire: number;
    created_at: string;
    updated_at: string;
    name: string;
    path_img: string;
    presentation: string;
}
export interface INewFavorite {
    id: number;
    id_user: number;
    name: string;
    id_prestataire: number;
    prestation: string;
    name_entreprise: string;
    path_user: string;
    created_at: string;
    updated_at: string;
}

export interface IFavoriteResponse {
    statu: number;
    listeFavoris: IFavorite[];
}
