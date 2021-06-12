<template>
   <v-row justify="center" v-if="isAuth">
    <v-dialog v-model="dialog">
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="dialog = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <v-toolbar-title>Settings</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
          <v-btn dark text @click="dialog = false"> Save </v-btn>
        </v-toolbar-items>
      </v-toolbar>
      <v-card>
        <!-- <v-card-title><h5>Connexion</h5></v-card-title> -->
        <v-card-text>
          <v-container>
            <p>Un text</p>
            <!-- <favorites-grid :favorites="favorites"></favorites-grid> -->
          </v-container>
        </v-card-text>
      </v-card>
    </v-dialog>
</template>
<script lang="ts">
import Vue from "vue";
import FavoriteForm from "../forms/FavoriteForm.vue";
import FavoritesGrid from "@/components/FavoritesGrid.vue";
import { IFavorite } from "@/interfaces/favorite.interface";
import { INewFavorite } from "@/interfaces/favorite.interface";
import { IProvider } from "@/interfaces/provider.interface";
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters({
      isAuth: "auth/isConnected",
      dialog: "auth/workerSpaceModal",
    }),
    dialog: {
      get(): boolean {
        console.log(this.$store.getters["auth/workerSpaceModal"]);

        return this.$store.getters["auth/workerSpaceModal"];
      },
      set(val: boolean) {
        this.$store.commit("auth/authWorkerSpaceModalStatus", val);
      },
    },
  },
  beforeDestroy() {
    this.$store.commit("auth/authWorkerSpaceModalStatus", false);
  },
};
</script>