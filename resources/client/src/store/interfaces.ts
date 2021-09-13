import { Content } from "@/interfaces/app-services.interfaces";

export interface IRootState {
    contactModal: boolean,
        loading: boolean,
        favoritesModal: boolean,
        contents: Content[]
}