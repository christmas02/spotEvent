
<template>
  <div>
    <v-form @submit.prevent="submit" ref="contactForm">
      <v-text-field
        label="Nom et prénoms"
        v-model="name"
        :disabled="isAuth"
      ></v-text-field>
      <v-text-field
        label="Numero de téléphone"
        v-model="phone"
        :disabled="isAuth"
      ></v-text-field>
      <v-text-field
        label="Email"
        v-model="email"
        type="email"
        :disabled="isAuth"
      ></v-text-field>
      <v-textarea label="Message" v-model="message"></v-textarea>
      <!-- <v-text-area :label="'Message adressé à ' + provider.name"></v-text-area> -->
      <v-btn color="primary" block type="submit">Envoyer</v-btn>
    </v-form>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import {
  IContactForm,
  IContactFormResponse,
} from "../../interfaces/app-services.interfaces";
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
      const result: IContactFormResponse = await service.contactForm(
        this.$data as IContactForm
      );

      if (result.statu == 1) {
        this.$swal({
          toast: true,
          icon: "success",
          title: result.messages,
          timer: 5000,
          showConfirmButton: false,
          position: "top-end",
        });

        // @ts-ignore
        this.message = "";
        this.$store.commit("contactModal", false);
      }
    },
  },
  computed: {
    isAuth(): boolean {
      return this.$store.getters["auth/isConnected"];
    },
  },
  beforeMount(): void {
    this.id_pres = this.provider;
    const user = this.$store.getters["auth/user"];
    if (user) {
      this.name = user.name;
      this.phone = user.phone;
      this.email = user.email;
    }
  },
});
</script>

<style scoped>
</style>