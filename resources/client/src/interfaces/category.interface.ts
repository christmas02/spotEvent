
    export interface ICategory {
        id: number;
        name: string;
        path_icone: string;
        description: string;
        statu: number;
        created_at: string;
        updated_at: string;
    }

    export interface ICategoryResponse {
        statu: number;
        listCategorie: ICategory[];
    }


