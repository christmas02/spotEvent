<template>
  <div>
    <v-form>
      <template v-if="user">
        <v-text-field
          label="Nom et prénoms"
          :value="user.name"
          disabled
        ></v-text-field>
        <v-text-field
          label="Numero de téléphone"
          :value="user.phone"
          disabled
        ></v-text-field>
        <v-text-field label="Email" :value="user.email" disabled></v-text-field>
      </template>
      <template v-else>
        <v-text-field label="Nom et prénoms"></v-text-field>
        <v-text-field label="Numero de téléphone"></v-text-field>
        <v-text-field label="Email"></v-text-field>
      </template>
      <v-textarea label="Message"></v-textarea>
      <!-- <v-text-area :label="'Message adressé à ' + provider.name"></v-text-area> -->
      <v-btn color="primary" block>Envoyer</v-btn>
    </v-form>
  </div>
</template>

<script lang="ts">
import Vue, { PropType } from "vue";
import { IUser } from "@/interfaces/auth.interfaces";
import { IProvider } from "@/interfaces/provider.interface";

export default Vue.extend({
  props: {
    provider: {
      type: Object as PropType<IProvider>,
      required: false,
    },
  },
  computed: {
    user(): IUser {
      return this.$store.getters["auth/user"];
    },
  },
});
</script>

<style scoped>
</style>