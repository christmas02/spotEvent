export interface ICommune {
    id: number;
    name: string;
    statu?: number;
    message?: string;
    created_at: string;
    updated_at: string;
}
export interface ICommuneSearch {
    id_commune: string;
}
export interface ICommuneResponse {
    statu: number;
    listCommune: ICommune[];
}
