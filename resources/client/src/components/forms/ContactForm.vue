<template>
  <div>
    <v-form @submit.prevent="submit">
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
        <v-text-field label="Nom et prénoms" v-model="name"></v-text-field>
        <v-text-field
          label="Numero de téléphone"
          v-model="phone"
        ></v-text-field>
        <v-text-field label="Email" v-model="email"></v-text-field>
      </template>
      <v-textarea label="Message" v-model="message"></v-textarea>
      <!-- <v-text-area :label="'Message adressé à ' + provider.name"></v-text-area> -->
      <v-btn color="primary" block type="submit">Envoyer</v-btn>
    </v-form>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import { IUser } from "@/interfaces/auth.interfaces";
import { IContactForm } from "../../interfaces/app-services.interfaces";
import { AppService } from "../../services/app.service";
export default Vue.extend({
  props: {
    provider: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      id_pres: "",
      name: "",
      phone: "",
      email: "",
      message: "",
    } as IContactForm;
  },
  methods: {
    async submit() {
      const service = new AppService();

      const result = await service.contactForm(this.$data as IContactForm);
      console.log(result);
    },
  },
  computed: {
    user(): IUser {
      return this.$store.getters["auth/user"];
    },
  },
  beforeMount(): void {
    this.id_pres = this.provider;
  },
});
</script>

<style scoped>
</style>