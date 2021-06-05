export interface IFavorite {
    id: number;
    id_user: number;
    id_prestataire: number;
    created_at: string;
    updated_at: string;
}

export interface IFavoriteResponse {
    statu: number;
    listeFavoris: IFavorite[];
}