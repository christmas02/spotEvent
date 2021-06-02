<template>
  <v-row justify="center" v-if="!isAuth">
    <v-dialog max-width="600px" v-model="dialog">
      <v-card>
        <v-card-title><h5>Connexion</h5></v-card-title>
        <v-card-text>
          <v-container>
            <login-form></login-form>
            <div class="text-center">
              <v-btn text color="primary">Je souhaite m'inscrire</v-btn>
            </div>
          </v-container>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script lang="ts">
import Vue from "vue";
import LoginForm from "../forms/LoginForm.vue";
import { mapGetters } from "vuex";
export default Vue.extend({
  components: { LoginForm },
  computed: {
    ...mapGetters({
      isAuth: "auth/isConnected",
      dialog: "auth/modal",
    }),
    dialog: {
      get(): boolean {
        return this.$store.getters["auth/modal"];
      },
      set(val: boolean) {
        this.$store.commit("auth/authModalStatus", val);
      },
    },
  },
});
</script>

<style scoped>
</style>