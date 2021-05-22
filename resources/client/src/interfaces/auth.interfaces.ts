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
}
