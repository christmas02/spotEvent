<template>
  <v-form ref="form" lazy-validation @submit.prevent="validate">
    <v-card-title>Modification mot de passe</v-card-title>
    <v-text-field
      label="Mot de passe"
      ref="password"
      v-model="password"
      :rules="passwordRules"
      :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
      :type="show1 ? 'text' : 'password'"
      @click:append="show1 = !show1"
    ></v-text-field>
    <v-text-field
      label="Confirmation du mot de passe"
      v-model="confirmPassword"
      type="password"
      :rules="confirmPasswordRules"
    ></v-text-field>

    <v-btn :disabled="valid" color="primary" class="mr-4" type="submit">
      Modifier
    </v-btn>
    <v-btn @click="comeBack" color="success" class="mr-4" type="submit">
      Retour
    </v-btn>
  </v-form>
</template>

<script lang="ts">
import Vue from "vue";
import validationsMixin from "@/mixins/validations.mixin";
import { IUpdatePassword, IUser } from "@/interfaces/auth.interfaces";
import { AuthService } from "@/services/auth.service";
export default Vue.extend({
  mixins: [validationsMixin],
  name: "form",
  data() {
    return {
      show1: false,
      confirmPassword: "",
      password: "",
      //   email: "",
      valid: false,
      passwordRules: [
        (value: string) => !!value || "Veillez entrer un mot de passe",
        (value: string) =>
          (value && value.length >= 8) ||
          "Veillez entre un minimum de 8 caracteres",
      ],
      confirmPasswordRules: [
        (value: string) => !!value || "type confirm password",
        (value: string) =>
          value === this.password || "Les mots de passes ne correspondent pas",
      ],
    };
  },
  methods: {
    validate() {
      //@ts-ignore
      if (this.$refs.form.validate()) {
        console.log("Valide");
        const myUser = new Object() as IUpdatePassword;
        myUser.id_user = this.id;
        myUser.password = this.password;
        this.updatePassword(myUser);
      } else {
        console.log("non valide");

        // this.CredentialStatus = true;
      }
    },
    async updatePassword(MyUser: IUpdatePassword): Promise<void> {
      const userService = new AuthService();
      console.log(MyUser);

      const result = await userService.updatePassword(MyUser);

      if (result.statu == 1) {
        console.log("modification effectué");
        this.$store.commit("benefits/resetStatusFormUpdatePhotoAndProfil");
      } else {
        console.log("erreur");
      }
    },
    comeBack() {
      this.$store.commit("benefits/resetStatusFormUpdatePhotoAndProfil");
    },
  },
  computed: {
    name() {
      return this.$store.getters["auth/user"].name.toString();
    },
    phone() {
      return this.$store.getters["auth/user"].phone.toString();
    },
    email() {
      return this.$store.getters["auth/user"].email.toString();
    },
    id() {
      return this.$store.getters["auth/user"].id.toString();
    },
  },
});
</script>

<style>
</style>