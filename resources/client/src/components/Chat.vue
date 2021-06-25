<template>
  <chat-window
    class="chat"
    :height="screenHeight"
    :current-user-id="currentUserId"
    :rooms="rooms"
    :room-id="roomId"
    :messages="messages"
    :loading-rooms="loadingRooms"
    :messages-loaded="messagesLoaded"
    :show-files="toFalse"
    :load-first-room="toFalse"
    :rooms-loaded="roomsLoaded"
    :text-messages="textMessages"
    @send-message="sendingMessage"
    @open-file="openFile"
    @fetch-messages="fetchLocalMessages"
    :show-audio="toFalse"
    :show-add-room="toFalse"
    :show-emojis="toFalse"
    :show-reaction-emojis="toFalse"
    :styles="styles"
  />
</template>

<script lang="ts">
import Vue from "vue";
import { AuthService } from "@/services/auth.service";
import ChatWindow, {
  Message,
  Messages,
  Room,
  Rooms,
  RoomUser,
  RoomUsers,
} from "vue-advanced-chat";
import "vue-advanced-chat/dist/vue-advanced-chat.css";
import { BenefitService } from "@/services/benefit.service";
import {
  IUser,
  IConversation,
  IMessage,
  IsendingMessage,
} from "@/interfaces/liste-conversations.interfaces";
import { IRoom, IRooms } from "@/interfaces/chat.interfaces";

export default Vue.extend({
  components: {
    ChatWindow,
  },
  data() {
    return {
      roomsLoaded: false, // go set true when all rooms are loaded
      loadingRooms: false,
      messagesLoaded: false, // go set true when all messages from a coversation are loaded
      loadFirstRoom: false,
      toFalse: false,
      roomId: null as unknown as number,

      rooms: [
        // {
        //   roomId: 1,
        //   roomName: "Room 1",
        //   avatar: "http://lorempixel.com/400/200/",
        //   users: [
        //     {
        //       _id: 1234,
        //       username: "John Doe",
        //       avatar: "http://lorempixel.com/400/300/",
        //       status: {
        //         state: "offline",
        //         last_changed: "today, 14:30",
        //       },
        //     },
        //     {
        //       _id: 4321,
        //       username: "John Snow",
        //       avatar: "http://lorempixel.com/400/200/",
        //       status: {
        //         state: "offline",
        //         last_changed: "14 July, 20:00",
        //       },
        //     },
        //   ],
        //   typingUsers: [4321],
        // },
        // {
        //   roomId: 2,
        //   roomName: "Room 5",
        //   avatar: "http://lorempixel.com/500/100/",
        //   unreadCount: 1,
        //   users: [
        //     {
        //       _id: 1234,
        //       username: "John Doe",
        //       avatar: "http://lorempixel.com/400/300/",
        //       status: {
        //         state: "offline",
        //         last_changed: "today, 14:30",
        //       },
        //     },
        //     {
        //       _id: 5678,
        //       username: "John Snow",
        //       avatar: "http://lorempixel.com/400/200/",
        //       status: {
        //         state: "offline",
        //         last_changed: "14 July, 20:00",
        //       },
        //     },
        //   ],
        //   typingUsers: [5678],
        // },
      ],
      messages: [] as Messages,
      menuActions: [
        {
          name: "inviteUser",
          title: "Invite User",
        },
        {
          name: "removeUser",
          title: "Remove User",
        },
        {
          name: "deleteRoom",
          title: "Delete Room",
        },
      ],
      messageActions: [
        {
          nom: "replyMessage",
          titre: "Répondre",
        },
        {
          nom: "editMessage",
          titre: "Modifier le message",
          onlyMe: true,
        },
        {
          nom: "deleteMessage",
          titre: "Supprimer le message",
          onlyMe: true,
        },
      ],
      textMessages: {
        ROOMS_EMPTY: "Aucune conversation",
        ROOM_EMPTY: "Aucune conversation sélectionnée",
        NEW_MESSAGES: "Nouveaux messages",
        MESSAGE_DELETED: "Ce message a été supprimé",
        MESSAGES_EMPTY: "Aucun message",
        CONVERSATION_STARTED: "La conversation a commencée le :",
        TYPE_MESSAGE: "Tapez votre message",
        SEARCH: "Rechercher",
        IS_ONLINE: "est en ligne",
        LAST_SEEN: "dernière connexion ",
        IS_TYPING: "est en train de taper...",
      },
      styles: {
        general: {
          color: "#0a0a0a",
          backgroundInput: "#fff",
          colorPlaceholder: "#9ca6af",
          colorCaret: "rgba(251, 178, 49, 1)",
          colorSpinner: "rgba(251, 178, 49, 1)", //"#333",
          //   borderStyle: "1px solid #e1e4e8",
          backgroundScrollIcon: "#fff",
        },

        container: {
          border: "none",
          borderRadius: "4px",
          boxShadow: "0px 3px 1px 1px #000",
        },

        header: {
          background: "rgba(251, 178, 49, 1)", //"#fff",
          colorRoomName: "#0a0a0a", //"rgba(251, 178, 49, 1)", //"#0a0a0a",
          colorRoomInfo: "#9ca6af",
        },

        footer: {
          background: "#f8f9fa",
          borderStyleInput: "1px solid #e1e4e8",
          borderInputSelected: "rgba(251, 178, 49, 1)",
          backgroundReply: "rgba(0, 0, 0, 0.08)",
        },

        content: {
          background: "rgba(230, 230, 255, .5)", //"#f8f9fa",
        },

        sidemenu: {
          background: "#fff",
          backgroundHover: "rgba(251, 178, 49, .2)", //rgba(251, 178, 49, .2)
          backgroundActive: "rgba(251, 178, 49, .4)",
          colorActive: "rgba(251, 178, 49, 1)",
          borderColorSearch: "#e1e5e8",
        },

        dropdown: {
          background: "#fff",
          backgroundHover: "#f6f6f6",
        },

        message: {
          background: "#fff",
          backgroundMe: "rgba(251, 178, 49, .4)", //"#ccf2cf",
          color: "#0a0a0a",
          colorStarted: "#9ca6af",
          backgroundDeleted: "#dadfe2",
          colorDeleted: "#757e85",
          colorUsername: "#9ca6af",
          colorTimestamp: "#828c94",
          backgroundDate: "rgba(251, 178, 49, .4)",
          colorDate: "#505a62",
          backgroundSystem: "#e5effa",
          colorSystem: "#505a62",
          backgroundReply: "rgba(0, 0, 0, 0.08)",
          colorReplyUsername: "#0a0a0a",
          colorReply: "#6e6e6e",
          backgroundImage: "#ddd",
          colorNewMessages: "rgba(251, 178, 49, 1)",
          backgroundReaction: "#eee",
          borderStyleReaction: "1px solid #eee",
          backgroundReactionHover: "#fff",
          borderStyleReactionHover: "1px solid #ddd",
          colorReactionCounter: "#0a0a0a",
          backgroundReactionMe: "#cfecf5",
          borderStyleReactionMe: "1px solid #3b98b8",
          backgroundReactionHoverMe: "#cfecf5",
          borderStyleReactionHoverMe: "1px solid #3b9f8b8",
          colorReactionCounterMe: "#0b59b3",
        },

        markdown: {
          background: "rgba(239, 239, 239, 0.7)",
          border: "rgba(212, 212, 212, 0.9)",
          color: "#e01e5a",
          colorMulti: "#0a0a0a",
        },

        room: {
          colorUsername: "#0a0a0a",
          colorMessage: "#67717a",
          colorTimestamp: "#a2aeb8",
          colorStateOnline: "#4caf50",
          colorStateOffline: "#ccc",
          backgroundCounterBadge: "rgba(251, 178, 49, 1)",
          colorCounterBadge: "#fff",
        },

        emoji: {
          background: "#fff",
        },

        icons: {
          search: "rgba(251, 178, 49, 1)",
          add: "rgba(251, 178, 49, 1)",
          toggle: "#0a0a0a",
          menu: "#0a0a0a",
          close: "#9ca6af",
          closeImage: "#fff",
          file: "rgba(251, 178, 49, 1)",
          paperclip: "rgba(251, 178, 49, 1)",
          closeOutline: "#000",
          send: "rgba(251, 178, 49, 1)",
          sendDisabled: "#9ca6af",
          emoji: "rgba(251, 178, 49, 1)",
          emojiReaction: "#828c94",
          document: "rgba(251, 178, 49, 1)",
          pencil: "#9e9e9e",
          checkmark: "#9e9e9e",
          checkmarkSeen: "#0696c7",
          eye: "#fff",
          dropdownMessage: "#fff",
          dropdownMessageBackground: "rgba(0, 0, 0, 0.25)",
          dropdownScroll: "#0a0a0a",
        },
      },
      idSecondUser: null as unknown as number,
      currentRoom: null as unknown as Room,
      allSecondUser: [] as number[],
      // currentUserId: 1234,
    };
  },
  computed: {
    currentUserId() {
      return this.$store.getters["auth/user"].id;
    },
    loadedRooms() {
      return this.rooms.slice(0, this.roomsLoadedCount);
    },
    screenHeight() {
      return this.isDevice ? window.innerHeight + "px" : "calc(100vh - 105px)";
    },
  },
  methods: {
    getDate(localDate: string) {
      let myDate = new Date(localDate);
      return myDate.toLocaleDateString("fr-FR", {
        day: "numeric",
        month: "long",
      });
    },
    async fetchRooms() {
      await this.$store.dispatch("auth/getRooms");
      const getAllRooms = this.$store.getters["auth/rooms"];
      let listRecepteur = [] as number[];
      const allRooms = [] as IRooms;

      const authUser = new Object() as RoomUser;

      authUser._id = this.$store.getters["auth/user"].id;
      authUser.username = this.$store.getters["auth/user"].name;
      authUser.avatar =
        window.location.origin +
        "/storage/" +
        this.$store.getters["auth/user"].path_user;

      authUser.status = {
        state: "offline",
        // lastChanged: "14 July, 20:00",
        lastChanged: "",
      };

      getAllRooms.forEach((element: IConversation) => {
        this.roomsLoaded = false;
        if (
          element.name_recepteur &&
          element.name_recepteur &&
          element.conversation &&
          element.id_recepteur &&
          !listRecepteur.includes(element.id_recepteur) &&
          element.id_recepteur !== this.currentUserId
        ) {
          //http://lorempixel.com/400/200/
          listRecepteur = [...listRecepteur, element.id_recepteur];
          const localRoom = new Object() as IRoom;

          localRoom.roomId = element.conversation;
          localRoom.roomName = element.name_recepteur;
          if (element.image_recepteur) {
            localRoom.avatar =
              window.location.origin + "/storage/" + element.image_recepteur;
          } else {
            localRoom.avatar = "http://lorempixel.com/450/250/";
          }

          const secondUser = new Object() as RoomUser;
          secondUser._id = element.id_recepteur;
          this.allSecondUser = [...this.allSecondUser, secondUser._id];
          secondUser.username = element.name_recepteur;
          secondUser.avatar = element.image_recepteur;
          secondUser.status = {
            state: "offline",
            lastChanged: "",
          };

          localRoom.users = [authUser, secondUser];
          // console.log(secondUser);
          // allRooms = [...allRooms, localRoom]
          allRooms.push(localRoom);
          console.log(localRoom);
        }
      });

      this.rooms = allRooms;
      this.roomsLoaded = true;
      return allRooms;
    },

    async fetchLocalMessages({ room, options }) {
      // console.log(room);
      // this.messagesLoaded = false;
      this.currentRoom = room;
      this.idSecondUser = room.users[1]._id;

      // console.log(room.users[1]._id);
      let allMessages = [] as Message[];
      await this.$store.dispatch("auth/getMessages", {
        conversation: { conversation: room.roomId.toString() },
      });
      const getAllMessages = this.$store.getters["auth/messages"];

      getAllMessages.forEach((stateMessage: IMessage) => {
        const roomMessage = new Object() as Message;
        roomMessage._id = stateMessage.id;
        roomMessage.content = stateMessage.contenus;
        roomMessage.senderId = stateMessage.id_emmetteur;

        roomMessage.date = this.getDate(stateMessage.created_at);

        roomMessage.timestamp = stateMessage.created_at
          .split(" ")[1]
          .split(":")
          .slice(0, 2)
          .join(":");
        allMessages = [...allMessages, roomMessage];
        console.log(stateMessage.created_at);
      });
      this.messagesLoaded = false;
      setTimeout(() => {
        this.messages = [...allMessages];
      }, 100);
      this.messagesLoaded = true;
    },

    async modLocalFetchMessage() {
      let allMessages = [] as Message[];
      await this.$store.dispatch("auth/getMessages", {
        conversation: { conversation: this.currentRoom.roomId.toString() },
      });
      const getAllMessages = this.$store.getters["auth/messages"];
      console.log(getAllMessages, this.currentRoom.roomId);

      getAllMessages.forEach((stateMessage: IMessage) => {
        const roomMessage = new Object() as Message;
        roomMessage._id = stateMessage.id;
        roomMessage.content = stateMessage.contenus;
        roomMessage.senderId = stateMessage.id_emmetteur;

        roomMessage.date = this.getDate(stateMessage.created_at);

        roomMessage.timestamp = stateMessage.created_at
          .split(" ")[1]
          .split(":")
          .slice(1)
          .join(":");
        allMessages = [...allMessages, roomMessage];
      });

      setTimeout(() => {
        this.messages = [...allMessages];
      }, 1000);
    },

    fetchMessages({ room, options }) {
      console.log(room);

      this.messagesLoaded = false;

      // use timeout to imitate async server fetched data
      setTimeout(() => {
        this.messages = [
          {
            _id: 1,
            content: "Mon premier message pour toi",
            senderId: 1234,
            username: "John Doe",
            // avatar: "assets/imgs/doe.png",
            date: "13 November",
            timestamp: "10:20",
            system: false,
            saved: true,
            distributed: true,
            seen: true,
            disableActions: false,
            disableReactions: false,
            file: {
              name: "My File",
              size: 67351,
              type: "png",
              audio: true,
              duration: 14.4,
              url: "http://lorempixel.com/400/200/",
            },
          },
          {
            _id: 2,
            content: "Je te repondrai tres bientot",
            senderId: 4321,
            username: "John Snow",
            // avatar: "assets/imgs/doe.png",
            date: "14 November",
            timestamp: "11:20",
            system: false,
            saved: true,
            distributed: true,
            seen: true,
            disableActions: false,
            disableReactions: false,
            // reactions: {
            //   wink: [
            //     // 1234, // USER_ID
            //     // 4321,
            //   ],
            //   laughing: [],
            // },
          },
        ];
        this.messagesLoaded = true;
      }, 3000);
    },
    openFile({ message }) {
      window.open(message.file.url, "_blank");
    },
    async sendingMessage({
      content,
      roomId,
      file,
      replyMessage,
    }): Promise<void> {
      const userService = new AuthService();
      const sending = {
        conversation: roomId.toString(),
        id_recepteur: this.idSecondUser.toString(),
        id_emmetteur: this.currentUserId.toString(),
        contenus: content,
      } as IsendingMessage;
      if (this.messages.length == 0) {
        sending.conversation = "0";
      }

      const result = await userService.sendingMessage(sending);

      if (result.statu == 1) {
        this.modLocalFetchMessage();
      } else {
        alert("erreur lors de la recuperation des messages");
      }
    },
    async modSendingFirstMessage(idBenefitToChat: number): Promise<any> {
      // let idBenefitToChat = this.$store.getters["auth/idBenefitToChat"];
      const userService = new AuthService();

      const sending = {
        conversation: "0",
        id_recepteur: idBenefitToChat.toString(),
        id_emmetteur: this.currentUserId.toString(),
        contenus: "Bienvenue sur le chat de SpotEvent",
      } as IsendingMessage;

      const result = await userService.sendingMessage(sending);

      if (result.statu == 1) {
        await this.fetchRooms();

        this.roomId = result.conversation;

        await this.modLocalFetchMessage();

        return result;
      } else {
        alert("erreur lors de la recuperation des messages");
      }
    },
  },
  async beforeMount() {
    await this.fetchRooms();
    const idBenefitToChat = this.$store.getters["auth/idBenefitToChat"];
    console.log("idBenefitToChat", idBenefitToChat);

    // console.log(this.allSecondUser, idBenefitToChat);
    let idRoom = null;

    if (idBenefitToChat && !this.allSecondUser.includes(idBenefitToChat)) {
      // console.log(idBenefitToChat);
      await this.modSendingFirstMessage(idBenefitToChat);
      // console.log("nouvelle conversation");

      idRoom = this.allSecondUser.indexOf(idBenefitToChat);

      this.roomId = this.rooms[idRoom].roomId;

      console.log("id room", this.rooms[idRoom].roomId);

      // this.$store.commit("auth/updateIdBenefitToChat", null);
    } else if (idBenefitToChat) {
      idRoom = this.allSecondUser.indexOf(idBenefitToChat);
      this.roomId = this.rooms[idRoom].roomId;
    }

    //  this.rooms[idRoom].roomId;
    // this.currentRoom = this.rooms[idRoom].roomId;
  },
  // beforeMount() {
  //   let idBenefitToChat = this.$store.getters["auth/idBenefitToChat"];
  //   if (idBenefitToChat) {
  //     console.log(idBenefitToChat);
  //   }
  // },
});
</script>
<style >
.chat * {
  z-index: auto;
}
</style>