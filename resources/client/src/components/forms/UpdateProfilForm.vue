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
      type="string"
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
import { IUpadteProfile, IUser } from "@/interfaces/auth.interfaces";
import { AuthService } from "@/services/auth.service";

export default Vue.extend({
  mixins: [validationsMixin],
  name: "form",
  data() {
    return {
      newName: "",
      newPhone: "",
      newEmail: "",
      valid: false,
    };
  },
  methods: {
    validate() {
      //   this.$refs.form.validate();
      //@ts-ignore
      if (this.$refs.form.validate()) {
        console.log("Valide");
        const MyUser = new Object() as IUpadteProfile;
        MyUser.id_user = this.id;
        MyUser.name = this.newName;
        MyUser.email = this.newEmail;
        MyUser.phone = this.newPhone;
        // console.log(MyUser);
        this.upadteProfile(MyUser);
      } else {
        console.log("non valide");

        // this.CredentialStatus = true;
      }
    },
    async upadteProfile(MyUser: IUpadteProfile): Promise<void> {
      const userService = new AuthService();
      console.log(MyUser);

      const result = await userService.upadteProfile(MyUser);

      if (result.statu == 1) {
        console.log(result);
        const newUser = this.$store.getters["auth/user"];
        newUser.id = MyUser.id_user;
        newUser.name = MyUser.name;
        newUser.email = MyUser.email;
        newUser.phone = MyUser.phone;

        this.$store.commit("auth/updateUser", newUser);
        this.$store.commit("benefits/resetStatusFormUpdatePhotoAndProfil");
      } else {
        console.log("erreur");

        // commit("upadteProfile", []);
      }
    },
    comeBack() {
      this.$store.commit("benefits/resetStatusFormUpdatePhotoAndProfil");
    },
  },
  computed: {
    name: {
      get() {
        this.newName = this.$store.getters["auth/user"].name.toString();
        return this.$store.getters["auth/user"].name.toString();
      },
      set(val: string) {
        this.newName = val;
      },
    },
    phone: {
      get() {
        this.newPhone = this.$store.getters["auth/user"].phone.toString();
        return this.$store.getters["auth/user"].phone.toString();
      },
      set(val: string) {
        this.newPhone = val;
      },
    },
    email: {
      get() {
        this.newEmail = this.$store.getters["auth/user"].email.toString();
        return this.$store.getters["auth/user"].email.toString();
      },
      set(val: string) {
        this.newEmail = val;
      },
    },
    id() {
      return this.$store.getters["auth/user"].id.toString();
    },
    pathUser() {
      return this.$store.getters["auth/user"].path_user;
    },
  },
});
</script>

<style>
</style>