<template>
  <v-app-bar id="app-navbar" color="white" :height="height" flat fixed>
    <div>
      <v-img
        @click="goHome"
        width="120"
        :src="require('../../assets/dark-logo.png')"
      >
      </v-img>
    </div>

    <v-spacer></v-spacer>

    <v-list class="nav-list d-none d-md-flex">
      <template v-for="link in links">
        <v-list-item
          :key="link.name"
          v-if="link.name != '#'"
          exact
          :to="{ name: link.name }"
        >
          <v-list-item-title>{{ link.label }}</v-list-item-title>
        </v-list-item>
        <v-list-item :key="link.label" v-else disabled>
          <v-list-item-title>{{ link.label }}</v-list-item-title>
        </v-list-item>
      </template>
    </v-list>

    <v-spacer></v-spacer>

    <template v-if="auth">
      <v-menu offset-y bottom>
        <template v-slot:activator="{ on, attrs }">
          <p v-bind="attrs" v-on="on" class="m-0">
            <v-avatar size="30" class="mr-2">
              <v-img
                lazy-src="https://picsum.photos/id/11/500/300"
                :src="user.path_user | createImagePath"
              ></v-img>
              <!-- <img :src="user.path_user | createImagePath" /> -->
            </v-avatar>
            {{ user.name }}
          </p>
        </template>

        <div class="my-list">
          <div class="d-md-none">
            <template v-for="link in links">
              <v-list-item
                :key="link.name"
                v-if="link.name != '#'"
                exact
                :to="{ name: link.name }"
              >
                <v-list-item-title>{{ link.label }}</v-list-item-title>
              </v-list-item>
              <v-list-item :key="link.label" v-else disabled>
                <v-list-item-title>{{ link.label }}</v-list-item-title>
              </v-list-item>
            </template>
          </div>
          <v-list-item link @click="activeWorkerSpaceModal">
            <v-list-item-title>Mon espace</v-list-item-title>
          </v-list-item>
          <v-list-item link @click="activeFavoriteModal">
            <v-list-item-title>Mes Favoris</v-list-item-title>
          </v-list-item>
          <v-list-item link @click="chat">
            <v-list-item-title>Mes messages</v-list-item-title>
          </v-list-item>

          <v-list-item link @click="logout">
            <v-list-item-title>Deconnexion</v-list-item-title>
          </v-list-item>
        </div>
      </v-menu>
      <!-- <worker-space-modal v-model="statusWorkerDialog"></worker-space-modal> -->
    </template>
    <template v-else>
      <v-btn color="primary" outlined :to="{ name: 'auth-login' }" exact>
        Connexion
      </v-btn>

      <v-btn color="primary" :to="{ name: 'auth-register' }" exact>
        Inscription
      </v-btn>
    </template>
    <template>
      <div>
        <worker-space-modal v-model="statusWorkerDialog"></worker-space-modal>
        <favorite-modal v-model="statusFavoriteDialog"></favorite-modal>
      </div>
    </template>
  </v-app-bar>
</template>

<script lang="ts">
import { IUser } from "@/interfaces/auth.interfaces";
import utilsMixin from "@/mixins/utils.mixin";
import favoriteModal from "@/components/global/favoriteModal.vue";
import WorkerSpaceModal from "@/components/global/WorkerSpaceModal.vue";

import Vue from "vue";
export default Vue.extend({
  components: { favoriteModal, WorkerSpaceModal },
  name: "navbar",
  props: {
    height: {
      type: String,
      default: "90",
    },
  },
  mixins: [utilsMixin],
  methods: {
    goHome() {
      this.$router.push("/");
    },
    logout() {
      this.$store.commit("auth/logout");
      if (this.$route.name != "Home") {
        this.$router.push("/");
      }
    },
    chat() {
      this.$store.commit("auth/updateIdBenefitToChat", null);
      this.$router.push({ name: "Chat" });
    },
    activeFavoriteModal() {
      this.statusFavoriteDialog = true;
      // this.$store.commit("auth/authFavoritesModalStatus", true);
    },
    activeWorkerSpaceModal() {
      console.log("ouvert");
      this.statusWorkerDialog = true;
      // this.$store.commit("auth/authWorkerSpaceModalStatus", true);
    },
  },
  data() {
    return {
      statusWorkerDialog: false,
      statusFavoriteDialog: false,
      links: [
        {
          name: "Home",
          label: "Acceuil",
        },
        {
          name: "about",
          label: "A propos de nous",
        },
        {
          name: "#",
          label: "Catégories",
        },
        {
          name: "#",
          label: "Prestataires",
        },
        {
          name: "contact",
          label: "Contacts",
        },
      ],
    };
  },
  computed: {
    auth(): boolean {
      return this.$store.getters["auth/isConnected"];
    },
    user(): IUser {
      return this.$store.getters["auth/user"];
    },
  },
});
</script>

<style>
#app-navbar {
  padding-left: 5%;
  padding-right: 5%;
  margin: 0 auto;
}
#app-navbar .primary--text {
  border: none;
  margin: 0 auto;
}
#app-navbar .primary--text .v-btn__content {
  color: var(--primary) !important;
}

.nav-list {
  font-weight: bold;
}

.nav-list .v-list-item {
  cursor: pointer;
}

.my-list {
  background: #fff;
}

.v-menu__content.theme--light.v-menu__content--fixed.menuable__content__active {
  top: 65px !important;
}
</style>
