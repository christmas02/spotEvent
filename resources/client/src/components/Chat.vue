<template>
  <chat-window
    class="chat"
    :height="screenHeight"
    :current-user-id="currentUserId"
    :rooms="rooms"
    :messages="messages"
    :loading-rooms="loadingRooms"
    :messages-loaded="messagesLoaded"
    :rooms-loaded="roomsLoaded"
    @fetch-messages="fetchMessages"
    @send-message="sendMessage"
    @open-file="openFile"
    :show-audio="toFalse"
    :show-add-room="toFalse"
    :show-emojis="toFalse"
    :show-reaction-emojis="toFalse"
    :styles="styles"
  />
</template>

<script lang="ts">
import Vue from "vue";
import ChatWindow, { Messages, RoomUsers } from "vue-advanced-chat";
import "vue-advanced-chat/dist/vue-advanced-chat.css";

export default Vue.extend({
  components: {
    ChatWindow,
  },
  data() {
    return {
      roomsLoaded: true, // go set true when all rooms are loaded
      loadingRooms: false,
      messagesLoaded: false, // go set true when all messages from a coversation are loaded
      loadFirstRoom: false,
      toFalse: false,

      rooms: [
        {
          roomId: 1,
          roomName: "Room 1",
          avatar: "http://lorempixel.com/400/200/",
          unreadCount: 4,
          lastMessage: {
            content: "Wikilix",
            sender_id: 1234,
            username: "John Doe",
            timestamp: "10:20",
            date: 123242424,
            saved: true,
            distributed: false,
            seen: false,
            new: true,
          },
          users: [
            {
              _id: 1234,
              username: "John Doe",
              avatar: "http://lorempixel.com/400/300/",
              status: {
                state: "offline",
                last_changed: "today, 14:30",
              },
            },
            {
              _id: 4321,
              username: "John Snow",
              avatar: "http://lorempixel.com/400/200/",
              status: {
                state: "offline",
                last_changed: "14 July, 20:00",
              },
            },
          ],
          typingUsers: [4321],
        },
        {
          roomId: 2,
          roomName: "Room 5",
          avatar: "http://lorempixel.com/500/100/",
          unreadCount: 1,
          lastMessage: {
            content: "The last msg",
            sender_id: 1234,
            username: "John Doe",
            timestamp: "10:20",
            date: 123242424,
            saved: true,
            distributed: false,
            seen: false,
            new: true,
          },
          users: [
            {
              _id: 1234,
              username: "John Doe",
              avatar: "http://lorempixel.com/400/300/",
              status: {
                state: "offline",
                last_changed: "today, 14:30",
              },
            },
            {
              _id: 5678,
              username: "John Snow",
              avatar: "http://lorempixel.com/400/200/",
              status: {
                state: "offline",
                last_changed: "14 July, 20:00",
              },
            },
          ],
          typingUsers: [5678],
        },
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
          background: "#fff",
          colorRoomName: "#0a0a0a",
          colorRoomInfo: "#9ca6af",
        },

        footer: {
          background: "#f8f9fa",
          borderStyleInput: "1px solid #e1e4e8",
          borderInputSelected: "rgba(251, 178, 49, 1)",
          backgroundReply: "rgba(0, 0, 0, 0.08)",
        },

        content: {
          background: "#f8f9fa",
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
      currentUserId: 1234,
    };
  },
  computed: {
    loadedRooms() {
      return this.rooms.slice(0, this.roomsLoadedCount);
    },
    screenHeight() {
      return this.isDevice ? window.innerHeight + "px" : "calc(100vh - 169px)";
    },
    currentUserId() {
      return this.$store.getters["auth/id"];
    },
  },
  methods: {
    menuActionHandler({ roomId, action }) {
      switch (action.name) {
        case "inviteUser":
        // call a method to invite a user to the room
        case "removeUser":
        // call a method to remove a user from the room
        case "deleteRoom":
        // call a method to delete the room
      }
    },

    messageActionHandler({ roomId, action, message }) {
      switch (action.name) {
        case "addMessageToFavorite":
        // call a method to add a message to the favorite list
        case "shareMessage":
        // call a method to share the message with another user
      }
    },
    fetchMessages({ room, options }) {
      this.messagesLoaded = false;

      // use timeout to imitate async server fetched data
      setTimeout(() => {
        this.messages = [
          {
            _id: 7890,
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
            reactions: {
              wink: [
                // 1234, // USER_ID
                // 4321,
              ],
              laughing: [],
            },
          },
          {
            _id: 7891,
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
            reactions: {
              wink: [
                // 1234, // USER_ID
                // 4321,
              ],
              laughing: [],
            },
          },
        ];
        this.messagesLoaded = true;
      }, 3000);
    },
    openFile({ message }) {
      window.open(message.file.url, "_blank");
    },

    async sendMessage({ content, roomId, file, replyMessage }) {
      const message = {
        sender_id: this.currentUserId,
        content,
        timestamp: new Date(),
      };
      if (file) {
        message.file = {
          name: file.name,
          size: file.size,
          type: file.type,
          extension: file.extension || file.type,
          url: file.localUrl,
        };
      }
      console.log("je viens d'envoyer un message");
    },
  },
});
</script>
<style >
.chat * {
  z-index: 0;
}
</style>