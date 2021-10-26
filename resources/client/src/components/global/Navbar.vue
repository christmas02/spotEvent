<template>
  <v-app-bar id="app-navbar" color="white" :height="height" app flat>
    <!-- <div class="d-none d-sm-block"> -->
    <div>
      <v-img
        @click="goHome"
        width="120"
        class="logo"
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
          <p v-bind="attrs" v-on="on" class="m-0 d-none d-md-block">
            <v-avatar size="30" class="mr-2">
              <v-img
                lazy-src="https://picsum.photos/id/11/500/300"
                :src="defaultUrl + pathUser"
                height="30px"
              ></v-img>
              <!-- :src="user.path_user | createImagePath" -->
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
      <div class="d-none d-md-block">
        <v-btn color="primary" outlined :to="{ name: 'auth-login' }" exact>
          Connexion
        </v-btn>

        <v-btn color="primary" :to="{ name: 'auth-register' }" exact>
          Inscription
        </v-btn>
      </div>
    </template>
    <v-app-bar-nav-icon
      class="d-block d-md-none"
      @click="actionDrawer"
    ></v-app-bar-nav-icon>
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

  model: {
    prop: "drawer",
    event: "change",
  },
  name: "navbar",
  props: {
    height: {
      type: String,
      default: "90",
    },
    isFixed: {
      type: Boolean,
      default: false,
    },
  },
  mixins: [utilsMixin],
  methods: {
    actionDrawer() {
      console.log("riffle");
      this.$emit("change", true);
    },
    goHome() {
      // this.$router.push("/");
      if (this.$route.name != "Home") {
        this.$router.push({ name: "Home" });
      }
    },
    logout() {
      // window.location.href = "/";
      this.$store.commit("auth/logout");
      this.$router.push({ name: "auth-login" });
      console.log("bingo");
      if (this.$route.name != "Home") {
        // this.$router.push("/");
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
      defaultUrl: `${window.location.origin}/`,
      statusWorkerDialog: false,
      statusFavoriteDialog: false,
      links: [
        {
          name: "Home",
          label: "Accueil",
        },
        {
          name: "about",
          label: "A propos de nous",
        },
        {
          name: "SeeMore",
          label: "Catégories",
        },
        {
          name: "listePrestataires",
          label: "Prestataires",
        },
        {
          name: "contact",
          label: "Contact",
        },
      ],
    };
  },
  computed: {
    pathUser: function () {
      return this.$store.getters["auth/user"].path_user;
    },
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
@media screen and (max-width: 425px) {
  .logo {
    width: 90px !important;
  }
}
#app-navbar {
  padding-left: 5%;
  padding-right: 5%;
  margin: 0 auto;
  display: inline;
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
