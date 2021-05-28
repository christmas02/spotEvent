
    export interface IEstimate {
        id: number;
        libelle: string;
        created_at: string;
        updated_at: string;
    }

    export interface IEstimateResponse {
        statu: number;
        listCategorie: IEstimate[];
    }


