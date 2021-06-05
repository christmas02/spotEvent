export interface IContactForm {
    id_pres: string;
    name: string;
    phone: string;
    email: string;
    message: string;
}

export interface IContactFormResponse {
    statu: number
    messages: string
}

export interface IClick {
    id_user: string
    id_pres: string
}

export interface IClickResponse {
    statu: number
}