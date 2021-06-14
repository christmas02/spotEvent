<template>
  <v-row justify="center" v-if="isAuth">
    <v-dialog fullscreen v-model="dialog">
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="dialog = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <v-toolbar-title>Mes Favoris</v-toolbar-title>
        <v-spacer></v-spacer>
      </v-toolbar>
      <v-card>
        <v-card-text>
          <v-container>
            <favorites-grid
              :favorites="favorites"
              v-if="favorites.length >= 1"
            ></favorites-grid>
            <div v-else class="nothing">
              <p>Votre liste de favori est vide</p>
            </div>
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
import { Benefit } from "../../interfaces/benefit.interface";
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
      const final = [] as Benefit[];
      const favorites = this.$store.getters["auth/favorites"];
      const providers = this.$store.getters["benefits/providers"];
      const benefits = this.$store.getters["benefits/all"];

      console.log(favorites, benefits);
      favorites.forEach((favori: INewFavorite) => {
        // const items = providers.filter((provider: IProvider) => provider.id === favori.id);
        benefits.forEach((benefit: Benefit) => {
          if (benefit.id_user === favori.id_prestataire) {
            final.push(benefit);
          }
        });
      });
      console.log(final);
      return final;
    },
  },
  // async beforeMount(): Promise<void> {
  //   console.log("fait fait");

  //   await Promise.all([this.$store.dispatch("benefits/fetchProviders")]);
  // },
});
</script>

<style scoped>
.nothing {
  text-align: center;
  padding-top: 20px;
  width: 100%;
  height: 100vh;
  font-size: 20px;
}
</style>