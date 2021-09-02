<template>
  <auth-layout
    title="Bienvenue !"
    subtitle="Plateforme de mise en relation  dans le secteur évènementiel."
    action="register"
  >
    <v-tabs
      v-model="tab"
      background-color="transparent"
      show-arrows
      grow
      center-active
      mobile-breakpoint="320"
      align-with-title
      :vertical="window.width < 620"
    >
      <v-tab>En tant que client</v-tab>
      <v-tab>En tant que prestataire</v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item>
        <register-form role="1"></register-form>
      </v-tab-item>
      <v-tab-item>
        <register-form role="2"></register-form>
      </v-tab-item>
    </v-tabs-items>
  </auth-layout>
</template>

<script lang="ts">
import Vue from "vue";
import RegisterForm from "@/components/forms/RegisterForm.vue";

export default Vue.extend({
  name: "register",
  components: {
    RegisterForm,
  },
  data() {
    return {
      tab: null,
      window: {
        width: 0,
        height: 0,
      },
    };
  },
  created() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
  },
  destroyed() {
    window.removeEventListener("resize", this.handleResize);
  },
  methods: {
    handleResize() {
      this.window.width = window.innerWidth;
      this.window.height = window.innerHeight;
    },
  },
});
</script>

<style scoped>
</style>
