export type StringNumber = string | number
export interface ISendComment {
    id_prestataire: string;
    id_user: string;
    vote: string;
    contenus: string;
}
export interface IResultComment {
    id: number;
    id_user: number;
    id_prestataire: number;
    vote: number;
    contenus: string;
    created_at: string;
    updated_at: string;
    nom_client: string;
}

export interface ISendCommentResponse {
    statu: number;
    message?: string;
    resultat: IResultComment[];
}

export interface IListComment {
    id_prestataire: string;
}
export interface IResultListComment {
    id: StringNumber;
    id_user: StringNumber;
    id_prestataire: StringNumber;
    vote: StringNumber;
    contenus: string;
    created_at: string;
    updated_at: string;
    nom_client: string;
}

export interface IResultListCommentResponse {
    statu: number;
    message?: string;
    resultat: IResultListComment[];
}
