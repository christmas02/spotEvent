<template>
  <v-form ref="form" lazy-validation @submit.prevent="validate">
    <v-card-title>Modification profil</v-card-title>
    <v-text-field label="Nom" v-model="name" :rules="nameRules"></v-text-field>
    <v-text-field
      label="phone"
      type="number"
      v-model="phone"
      :rules="phoneCiRules"
    ></v-text-field>
    <v-text-field
      v-model="email"
      :rules="emailRules"
      label="E-mail"
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
      //   name: "",
      //   phone: "",
      //   email: "",
      valid: false,
    };
  },
  methods: {
    validate() {
      //   this.$refs.form.validate();
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