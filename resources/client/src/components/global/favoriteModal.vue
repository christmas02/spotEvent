<template>
  <v-row justify="center" v-if="isAuth">
    <v-dialog fullscreen v-model="dialog">
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="dialog = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <v-toolbar-title>Mes Favoris</v-toolbar-title>
        <v-spacer></v-spacer>
        <!-- <v-toolbar-items>
          <v-btn dark text @click="dialog = false"> Save </v-btn>
        </v-toolbar-items> -->
      </v-toolbar>
      <v-card>
        <!-- <v-card-title><h5>Connexion</h5></v-card-title> -->
        <v-card-text>
          <v-container>
            <favorites-grid :favorites="favorites"></favorites-grid>
          </v-container>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script lang="ts">
import Vue from "vue";
import FavoriteForm from "../forms/FavoriteForm.vue";
import FavoritesGrid from "@/components/FavoritesGrid.vue";
import { IFavorite } from "@/interfaces/favorite.interface";
import { INewFavorite } from "@/interfaces/favorite.interface";
import { IProvider } from "@/interfaces/provider.interface";
import { mapGetters } from "vuex";
export default Vue.extend({
  components: { FavoriteForm, FavoritesGrid },
  data() {
    return {
      notifications: false,
      sound: true,
      widgets: false,
      // favorites: [] as INewFavorite[],
    };
  },
  methods: {
    myFavorites() {
      const final = [] as INewFavorite[];
      const favorites = this.$store.getters["auth/favorites"];
      const providers = this.$store.getters["benefits/providers"];
      console.log(final);
      favorites.forEach((favori: INewFavorite) => {
        // const items = providers.filter((provider: IProvider) => provider.id === favori.id);
        providers.forEach((provider: IProvider) => {
          if (provider.id === favori.id) {
            favori.prestation = provider.prestation;
            favori.name = provider.name;
            favori.name_entreprise = provider.name_entreprise;
            favori.path_user = provider.path_user;
            final.push(favori);
          }
        });
      });
      return final;
    },
  },
  computed: {
    ...mapGetters({
      isAuth: "auth/isConnected",
      // dialog: "auth/favoritesModal",
    }),
    dialog: {
      get(): boolean {
        return this.$store.getters["auth/favoritesModal"];
      },
      set(val: boolean) {
        this.$store.commit("auth/authFavoritesModalStatus", val);
      },
    },
    favorites() {
      const final = [] as INewFavorite[];
      const favorites = this.$store.getters["auth/favorites"];
      const providers = this.$store.getters["benefits/providers"];
      console.log(final);
      favorites.forEach((favori: INewFavorite) => {
        // const items = providers.filter((provider: IProvider) => provider.id === favori.id);
        providers.forEach((provider: IProvider) => {
          if (provider.id === favori.id) {
            favori.prestation = provider.prestation;
            favori.name = provider.name;
            favori.name_entreprise = provider.name_entreprise;
            favori.path_user = provider.path_user;
            final.push(favori);
          }
        });
      });
      return final;
    },
  },
  // beforeMount() {
  //   console.log(this.$store.getters["benefits/providers"], "before");
  // },
  // watch: {
  //   dialog: function (n, o) {
  //     if (n == true) {
  //       this.favorites = this.myFavorites();
  //     }
  //   },
  // },
  beforeDestroy() {
    this.$store.commit("auth/authFavoritesModalStatus", false);
  },
});
</script>

<style scoped>
</style>