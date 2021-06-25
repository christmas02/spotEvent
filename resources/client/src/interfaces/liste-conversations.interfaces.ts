export interface IListeConversationsResponse {
    statu: number;
    message: string;
    conversation: IConversation[];
}
export interface IListeMessagesResponse {
    statu: number;
    message: string;
    messages: IMessage[];
}
export interface IMessage {
    id: number;
    conversation: number;
    id_emmetteur: number;
    contenus: string;
    created_at: string;
    updated_at: string;
}

export interface IConversation {
    id_recepteur: number;
    name_recepteur: string;
    image_recepteur: string;
    id_message: number;
    conversation: number;
}

export interface IUserId {
    id_user: number;
}
export interface IUserId {
    id_user: number;
}
export interface IConversationId {
    conversation: string;
}
export interface IsendingMessage {
    conversation: string;
    contenus: string;
    id_recepteur: string;
    id_emmetteur: string;
}

export interface IsendingMessageResponse {
    statu: number;
    message: string;
    conversation: number;
}
