import { IFavorite } from "./favorite.interface";

export interface ILogin {
    email: string;
    password: string;
}

export interface IRegister {
    name: string;
    email: string;
    role: string;
    phone: string;
    password: string;
    password_confirmation: string;
}

export interface IRegisterResponse {
    statu: number;
    role: string;
    message?: string;
}

export interface IUser {
    name: string;
    id: number;
    email: string;
    phone: number;
    path_user: string;
}
export interface IUserId {
    id_user: number;
}

export interface ILoginResponse {
    statu: number;
    role: number;
    lien: string;
    user: IUser;
    favoris: IFavorite[];
    message?: string;
}
export interface IUpadteProfile {
    id_user: string;
    name: string;
    email: string;
    phone: string;
}
export interface IUpadteProfileResponse {
    statu: number;
    message: string;
}
export interface IUpdatePassword {
    id_user: string;
    password: string;
}
export interface IUpdatePasswordResponse {
    statu: number;
    message: string;
}
export interface ISaveImage {
    id_user: number;
    image: string;
}
export interface ISaveImageResponse {
    statu: number;
    message: string;
}
