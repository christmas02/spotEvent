<template>
  <auth-layout
    title="Hello !"
    subtitle="Connecte-toi afin d'accéder à la plateforme."
    action="login"
  >
    <div class="login-container">
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
