<template>
  <v-form
    ref="registerForm"
    lazy-validation
    @submit.prevent="registerUser"
    class="h-100 d-flex flex-column justify-content-between"
  >
    <h1 class="page-title">Inscription</h1>

    <div class="mt-3">
      <v-text-field
        label="Nom et prenoms"
        v-model="form.name"
        :rules="requiredRules"
      ></v-text-field>
      <v-text-field
        v-if="role == 2"
        label="Nom de l'entreprise"
        v-model="form.entreprise"
        :rules="requiredRules"
      ></v-text-field>
      <v-text-field
        label="Email"
        type="email"
        v-model="form.email"
        :rules="emailRules"
      ></v-text-field>
      <v-text-field
        label="N° de téléphone"
        v-model="form.phone"
        type="tel"
        :rules="requiredRules"
      ></v-text-field>
      <v-text-field
        v-model="form.password"
        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
        :type="show1 ? 'text' : 'password'"
        label="Choisir un mot de passe"
        @click:append="show1 = !show1"
        :rules="passwordRules"
      ></v-text-field>
      <v-text-field
        v-model="form.password_confirmation"
        :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
        :type="show2 ? 'text' : 'password'"
        label="Confirmer le mot de passe"
        @click:append="show2 = !show2"
        :rules="confirmPasswordRules"
      ></v-text-field>
    </div>
    <div class="nb" v-if="role == 2">
      <p class="font-weight-bold">
        N.B : - Lorsque vous souhaiterez joindre un prestataire par téléphone,
        une notification lui sera envoyée comportant des informations telles que
        votre prénom et votre nom ainsi que votre contact téléphonique
      </p>
      <p class="font-weight-bold">
        - Lorsque vous aurez collaboré avec un prestataire, vous serez être
        sollicité (e) pour noter le prestataire
      </p>
    </div>
    <div>
      <v-btn color="primary" type="submit" :disabled="loading">
        <template v-if="loading">Veuillez patienter ...</template>
        <v-icon v-else>mdi-arrow-right</v-icon>
      </v-btn>
    </div>
  </v-form>
</template>

<script lang="ts">
import Vue from "vue";
import { IRegister } from "@/interfaces/auth.interfaces";
import ValidationsMixin from "@/mixins/validations.mixin";
import { AuthService } from "@/services/auth.service";

export default Vue.extend({
  mixins: [ValidationsMixin],
  name: "RegisterForm",
  props: {
    role: {
      type: String,
      required: true,
    },
  },

  data() {
    return {
      form: {
        name: "",
        entreprise: "",
        email: "",
        role: "",
        phone: "",
        password: "",
        password_confirmation: "",
      } as IRegister,
      show1: false,
      show2: false,
      loading: false,
    };
  },
  methods: {
    async registerUser(): Promise<void> {
      // @ts-ignore
      if (this.$refs.registerForm.validate()) {
        this.loading = true;
        this.form.role = this.role;
        const authService = new AuthService();

        const result = await authService.initRegister(this.form);

        this.loading = false;

        if (result.statu != 0) {
          const result = await this.$swal({
            icon: "info",
            text: "Vous avez reçu un email de confirmation, verifiez aussi vos spams si vous le retrouvez pas dans votre boite de receprion",
            allowOutsideClick: false,
          });

          if (result.isConfirmed) {
            await this.$router.push({ name: "auth-login" });
          }
        } else {
          this.$swal({ icon: "error", text: result.message });
        }
      }
    },
  },
  computed: {
    confirmPasswordRules() {
      return [
        (v: string) =>
          v === this!.form.password || "Mots de passes pas identiques",
      ];
    },
  },
});
</script>

<style scoped>
</style>
