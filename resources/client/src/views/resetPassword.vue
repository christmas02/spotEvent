<template>
  <div class="elem">
    <v-img src="./images/forgetPassword.jpg" width="150" height="100"></v-img>
    <div class="d-flex justify-center mt-5">
      <router-link :to="{ name: 'auth-login' }">
        <v-img
          :src="require('@/assets/light-logo.png')"
          max-width="150"
        ></v-img>
      </router-link>
    </div>
    <v-card width="500" class="mx-auto px-5 localCard py-5">
      <h2 class="text-center">
        Renseignez votre E-mail pour reinitialiser votre mot de passe
      </h2>
      <v-form
        ref="form"
        class="my-5"
        lazy-validation
        @submit.prevent="validate"
      >
        <v-text-field
          label="E-mail"
          placeholder="Votre E-mail"
          outlined
          required
          v-model="email"
          :rules="emailRules"
        ></v-text-field>
        <div class="d-flex justify-center my-5">
          <!-- <v-btn color="primary" type="submit"> Soumettre </v-btn> -->
          <v-btn color="primary" type="submit" :disabled="loading">{{
            loading ? "Veuillez patienter ..." : "soumettre"
          }}</v-btn>
        </div>
      </v-form>
    </v-card>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import validationsMixin from "@/mixins/validations.mixin";
import { AuthService } from "@/services/auth.service";

export default Vue.extend({
  mixins: [validationsMixin],
  data() {
    return {
      loading: false,
      email: null as unknown as string,
    };
  },
  // beforeRouteEnter() {
  //   this.loading = false;
  // },
  methods: {
    validate() {
      //@ts-ignore

      if (this.$refs.form.validate()) {
        this.loading = true;
        this.resetPassword();
        // this.swal()
      } else {
        console.log("non valide");

        // this.CredentialStatus = true;
      }
    },
    async resetPassword(): Promise<void> {
      const userService = new AuthService();
      const result = await userService.resetPassword({ email: this.email });

      if (result.statu == 1) {
        await this.$swal({
          icon: "success",
          text: "Votre mot de passe a bien été reinitilaisé , veillez consultez votre boite mail",
        });
        this.$router.push({ name: "auth-login" });
        // commit("updateUser", );
      } else {
        await this.$swal({
          icon: "error",
          text: "Une erreur est survenue durant le processus , veillez contacter notre service client",
        });
        console.log("erreur");
        // commit("upadteProfile", []);
      }
      this.loading = false;
    },
  },
});
</script>

<style scoped>
.localCard {
  margin-top: 50px;
}
.elem {
  height: 100vh;
  background: url("/images/forgetPassword.jpg");
}
</style>