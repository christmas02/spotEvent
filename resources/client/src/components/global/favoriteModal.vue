<template>
  <v-row justify="center" v-if="isAuth">
    <v-dialog max-width="600px" v-model="dialog">
      <v-card>
        <v-card-title><h5>Connexion</h5></v-card-title>
        <v-card-text>
          <v-container>
            <favorite-form></favorite-form>
            <div class="text-center">
              <v-btn text color="primary">Fermer</v-btn>
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
import { mapGetters } from "vuex";
export default Vue.extend({
  components: { FavoriteForm },
  computed: {
    ...mapGetters({
      isAuth: "auth/isConnected",
      dialog: "auth/favoritesModal",
    }),
    dialog: {
      get(): boolean {
        return this.$store.getters["auth/favoritesModal"];
      },
      set(val: boolean) {
        this.$store.commit("auth/authFavoritesModalStatus", val);
      },
    },
  },
});
</script>

<style scoped>
</style>