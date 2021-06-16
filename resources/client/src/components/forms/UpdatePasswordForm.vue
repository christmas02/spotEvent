<template>
  <v-form ref="form" lazy-validation @submit.prevent="validate">
    <v-card-title>Modification mot de passe</v-card-title>
    <v-text-field
      label="Ancien mot de passe"
      v-model="oldPassword"
    ></v-text-field>
    <v-text-field
      label="Nouveau mot de passe"
      v-model="NewPassword"
      type="password"
      :rules="passwordRules"
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
export default Vue.extend({
  mixins: [validationsMixin],
  name: "form",
  data() {
    return {
      NewPassword: "",
      oldPassword: "",
      //   email: "",
      valid: false,
    };
  },
  methods: {
    validate() {
      //@ts-ignore
      if (this.$refs.form.validate()) {
        console.log("Valide");
      } else {
        console.log("non valide");

        // this.CredentialStatus = true;
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
  },
});
</script>

<style>
</style>