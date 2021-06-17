<template>
  <chat-window
    :current-user-id="currentUserId"
    :rooms="rooms"
    :messages="messages"
    :loading-rooms="loadingRooms"
    :messages-loaded="messagesLoaded"
    :rooms-loaded="roomsLoaded"
  />
</template>

<script lang="ts">
import Vue from "vue";
import ChatWindow from "vue-advanced-chat";
import "vue-advanced-chat/dist/vue-advanced-chat.css";

export default Vue.extend({
  components: {
    ChatWindow,
  },
  data() {
    return {
      roomsLoaded: true, // go set true when all rooms are loaded
      loadingRooms: false,
      messagesLoaded: true, // go set true when all messages from a coversation are loaded
      loadFirstRoom: false,
      users: {
        USER_ID_1: {
          _id: 1,
          username: "User 1",
        },
        USER_ID_2: {
          _id: 2,
          username: "User 2",
        },
        USER_ID_3: {
          _id: 3,
          username: "User 2",
        },
      },

      rooms: [
        {
          roomId: 1,
          roomName: "Room 1",
          avatar: "assets/imgs/people.png",
          unreadCount: 4,
          lastMessage: {
            content: "Last message received",
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
              avatar: "assets/imgs/doe.png",
              status: {
                state: "online",
                last_changed: "today, 14:30",
              },
            },
            {
              _id: 4321,
              username: "John Snow",
              avatar: "assets/imgs/snow.png",
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
          roomName: "Room 2",
          avatar: "assets/imgs/people.png",
          unreadCount: 4,
          lastMessage: {
            content: "Je suis sur de sa !!",
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
              avatar: "assets/imgs/doe.png",
              status: {
                state: "online",
                last_changed: "today, 14:30",
              },
            },
            {
              _id: 4321,
              username: "John Snow",
              avatar: "assets/imgs/snow.png",
              status: {
                state: "offline",
                last_changed: "14 July, 20:00",
              },
            },
          ],
          typingUsers: [4321],
        },
      ],
      messages: [
        {
          _id: 7890,
          content: "message 1",
          senderId: 1234,
          username: "John Doe",
          avatar: "assets/imgs/doe.png",
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
            url: "https://firebasestorage.googleapis.com/...",
            preview: "data:image/png;base64,iVBORw0KGgoAA...",
          },
          reactions: {
            wink: [
              1234, // USER_ID
              4321,
            ],
            laughing: [1234],
          },
        },
      ],
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
      chatRooms: {
        ROOM_ID_1: {
          users: [1, 3],
        },
        ROOM_ID_2: {
          users: [1, 2, 3],
        },
      },
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
          colorCaret: "#1976d2",
          colorSpinner: "#333",
          borderStyle: "1px solid #e1e4e8",
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
          borderInputSelected: "#1976d2",
          backgroundReply: "rgba(0, 0, 0, 0.08)",
        },

        content: {
          background: "#f8f9fa",
        },

        sidemenu: {
          background: "#fff",
          backgroundHover: "#f6f6f6",
          backgroundActive: "#e5effa",
          colorActive: "#1976d2",
          borderColorSearch: "#e1e5e8",
        },

        dropdown: {
          background: "#fff",
          backgroundHover: "#f6f6f6",
        },

        message: {
          background: "#fff",
          backgroundMe: "#ccf2cf",
          color: "#0a0a0a",
          colorStarted: "#9ca6af",
          backgroundDeleted: "#dadfe2",
          colorDeleted: "#757e85",
          colorUsername: "#9ca6af",
          colorTimestamp: "#828c94",
          backgroundDate: "#e5effa",
          colorDate: "#505a62",
          backgroundSystem: "#e5effa",
          colorSystem: "#505a62",
          backgroundReply: "rgba(0, 0, 0, 0.08)",
          colorReplyUsername: "#0a0a0a",
          colorReply: "#6e6e6e",
          backgroundImage: "#ddd",
          colorNewMessages: "#1976d2",
          backgroundReaction: "#eee",
          borderStyleReaction: "1px solid #eee",
          backgroundReactionHover: "#fff",
          borderStyleReactionHover: "1px solid #ddd",
          colorReactionCounter: "#0a0a0a",
          backgroundReactionMe: "#cfecf5",
          borderStyleReactionMe: "1px solid #3b98b8",
          backgroundReactionHoverMe: "#cfecf5",
          borderStyleReactionHoverMe: "1px solid #3b98b8",
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
          backgroundCounterBadge: "#0696c7",
          colorCounterBadge: "#fff",
        },

        emoji: {
          background: "#fff",
        },

        icons: {
          search: "#9ca6af",
          add: "#1976d2",
          toggle: "#0a0a0a",
          menu: "#0a0a0a",
          close: "#9ca6af",
          closeImage: "#fff",
          file: "#1976d2",
          paperclip: "#1976d2",
          closeOutline: "#000",
          send: "#1976d2",
          sendDisabled: "#9ca6af",
          emoji: "#1976d2",
          emojiReaction: "#828c94",
          document: "#1976d2",
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
  },
  // messageActionHandler({ roomId, action, message }) {
  //   switch (action.name) {
  //     case "addMessageToFavorite":
  //     // call a method to add a message to the favorite list
  //     case "shareMessage":
  //     // call a method to share the message with another user
  //   }
  // },
});
</script>