<template>
  <auth-layout
    title="Hello !"
    subtitle="Contents de vous revoir parmi nous"
    action="login"
  >
    <div class="login-container">
      <h1 class="page-title">Connexion</h1>

      <login-form></login-form>
    </div>
  </auth-layout>
</template>

<script lang="ts">
import Vue from "vue";
import LoginForm from "@/components/forms/LoginForm.vue";

export default Vue.extend({
  name: "login",
  components: {
    LoginForm,
  },
});
</script>

<style scoped>
.login-container {
  display: flex;
  height: 100%;
  flex-direction: column;
  justify-content: center;
}
</style>
