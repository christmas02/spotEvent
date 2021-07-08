import { IUser } from "@/interfaces/auth.interfaces";
import { IFavorite } from "@/interfaces/favorite.interface";
import { IConversation } from "@/interfaces/chat.interface";
import { Message } from "vue-advanced-chat";
import { IMessage } from "@/interfaces/liste-conversations.interfaces";
import { IResultListComment } from "@/interfaces/comment.interface";

export interface IAuthState {
    user: IUser;
    auth: boolean;
    workerSpaceModal: boolean;
    favoritesModal: boolean;
    modal: boolean;
    favorites: IFavorite[];
    rooms: IConversation[];
    messages: IMessage[];
    idBenefitToChat: number;
    isComment: boolean;
    listComment: IResultListComment[];
}
