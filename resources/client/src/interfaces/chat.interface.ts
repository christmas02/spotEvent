export type StringNumber = string | number;
export interface IRoom {
    roomId: StringNumber;
    avatar: string;
    roomName: string;
    users: RoomUsers;
    unreadCount?: StringNumber;
    index?: StringNumber | Date;
    lastMessage?: LastMessage;
    typingUsers?: StringNumber[];
}
export type IRooms = IRoom[];
export type RoomUsers = RoomUser[];

export interface RoomUser {
    _id: StringNumber;
    username: string;
    avatar: string;
    status: UserStatus;
}
export interface UserStatus {
    state: "online" | "offline";
    lastChanged: string;
}
export interface LastMessage {
    content: string;
    senderId: StringNumber;
    username?: string;
    timestamp?: string;
    saved?: boolean;
    distributed?: boolean;
    seen?: boolean;
    new?: boolean;
}

export interface IListeCnversationsResponse {
    // id: number;
    // statu: number;
    // message: string;
    // conversation: IConversation[];
    statu: number;
    message: string;
    conversation: IConversation[];
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
