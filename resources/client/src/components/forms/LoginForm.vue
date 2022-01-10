<template>
  <v-form
    class="login-form"
    ref="loginForm"
    lazy-validation
    @submit.prevent="initLogin"
  >
    <div>
      <v-text-field
        label="Email"
        :rules="emailRules"
        v-model="form.email"
      ></v-text-field>

      <v-text-field
        v-model="form.password"
        :rules="requiredRules"
        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
        :type="show1 ? 'text' : 'password'"
        label="Choisir un mot de passe"
        @click:append="show1 = !show1"
      ></v-text-field>
    </div>
    <div class="d-sm-flex justify-space-between align-end">
      <div>
        <v-btn color="primary" type="submit" :disabled="loading">{{
          loading ? "Veuillez patienter ..." : "Connexion"
        }}</v-btn>
      </div>
      <div :style="$vuetify.breakpoint.smAndDown ? 'margin-top: 10px' : ''">
        <router-link :to="{ name: 'reset' }">
          Mot de passe oublié ?</router-link
        >
      </div>
    </div>
    <div class="mt-8" v-if="$vuetify.breakpoint.smAndDown">
      <router-link :to="{ name: 'auth-register' }">Inscrivez-vous</router-link>
    </div>
    <!-- <div class="mt-8" v-if="$vuetify.breakpoint.smAndDown">
      <router-link :to="{ name: 'auth-register' }">Inscrivez-vous</router-link>
    </div> -->
  </v-form>
</template>

<script lang="ts">
import Vue from "vue";
import validationsMixin from "@/mixins/validations.mixin";
import { AuthService } from "@/services/auth.service";
import { ILogin } from "@/interfaces/auth.interfaces";

export default Vue.extend({
  mixins: [validationsMixin],
  name: "LoginForm",
  data() {
    return {
      form: {
        email: "",
        password: "",
      } as ILogin,
      show1: false,
      loading: false,
    };
  },
  methods: {
    async initLogin() {
      // @ts-ignore
      if (this.$refs.loginForm.validate()) {
        this.loading = true;
        const authService = new AuthService();

        const result = await authService.initLogin(this.form);

        this.loading = false;

        if (result.statu != 0) {
          switch (result.role) {
            case 1:
              this.$store.commit("auth/login", result);
              console.log(this.$route.params);

              const urlParams = this.$route.params.isDetailBenefit;

              if (this.$route.params.routeName == "benefit") {
                console.log("winnamax");

                await this.$router.push(
                  this.$route.params.urlDetailBenefit.toString()
                );
              } else {
                console.log("furia");
                await this.$router.push({ name: "Home" });
              }

              break;
            case 2:
            case 3:
              window.location.href = window.location.origin + "/" + result.lien;
              break;
            default:
              this.$swal({ icon: "error", text: result.message });
          }
        } else {
          this.$swal({ icon: "warning", text: result.message });
        }
      }
    },
  },
});
</script>

<style scoped>
.login-form {
  display: flex;
  flex-direction: column;
}
</style>
