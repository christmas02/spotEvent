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

    <v-list class="nav-list">
      <v-list-item to="/">
        <v-list-item-title>Acceuil</v-list-item-title>
      </v-list-item>

      <v-list-item :to="{ name: 'about' }">
        <v-list-item-title>A propos de nous</v-list-item-title>
      </v-list-item>

      <v-list-item>
        <v-list-item-title>Catégories</v-list-item-title>
      </v-list-item>

      <v-list-item>
        <v-list-item-title>Prestataires</v-list-item-title>
      </v-list-item>

      <v-list-item :to="{ name: 'contact' }">
        <v-list-item-title>Contacts</v-list-item-title>
      </v-list-item>
    </v-list>

    <v-spacer></v-spacer>

    <template v-if="auth">
      <div>
        <span class="mr-2">{{ user.name }}</span>
        <v-menu offset-y left bottom>
          <template v-slot:activator="{ on }">
            <v-btn icon v-on="on">
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
          </template>
          <v-card>
            <v-list-item-content class="justify-center">
              <div class="mx-auto text-center">
                <v-btn text color="primary"> Mon espace </v-btn>
                <v-divider></v-divider>
                <v-btn text color="primary" @click="logout">
                  Deconnexion
                </v-btn>
              </div>
            </v-list-item-content>
          </v-card>
        </v-menu>
      </div>
    </template>
    <template v-else>
      <v-btn color="primary" outlined :to="{ name: 'auth-login' }" exact>
        Connexion
      </v-btn>

      <v-btn color="primary" :to="{ name: 'auth-register' }" exact>
        Inscription
      </v-btn>
    </template>
  </v-app-bar>
</template>

<script lang="ts">
import { IUser } from "@/interfaces/auth.interfaces";
import Vue from "vue";
export default Vue.extend({
  name: "navbar",
  props: {
    height: {
      type: String,
      default: "90",
    },
  },
  methods: {
    goHome() {
      this.$router.push("/");
    },
    logout() {
      this.$store.commit("auth/logout");
      this.$router.push({ name: "auth-login" });
    },
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
  width: 90%;
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
  display: flex !important;
  font-weight: bold;
}

.nav-list .v-list-item {
  cursor: pointer;
}
</style>
