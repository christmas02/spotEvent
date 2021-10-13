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
      :hide-slider="true"
      grow
      center-active
      mobile-breakpoint="320"
      align-with-title
      :vertical="window.width < 620"
      class="mt-2 tab-mod"
    >
      <v-tab
        tag="button"
        class="
          px-0
          v-btn--active
          v-btn v-btn--outlined v-btn--router
          theme--light
          v-size--large
          primary--text
        "
        active-class="v-btn v-btn--is-elevated v-btn--has-bg v-btn--router theme--light v-size--large dtt primary tertiary--text "
      >
        Je suis un client
      </v-tab>
      <div class="mx-2 my-2"></div>
      <v-tab
        tag="button"
        class="
          px-0
          v-btn--active
          v-btn v-btn--outlined v-btn--router
          theme--light
          v-size--large
          primary--text
        "
        active-class="v-btn v-btn--is-elevated v-btn--has-bg v-btn--router theme--light v-size--large dtt primary tertiary--text "
      >
        Je suis un prestataire
      </v-tab>
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
  computed: {
    currentRouteName() {
      return this.$route.name;
    },
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
