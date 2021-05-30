<template>
  <v-btn icon color="primary" x-large @click="onClick" :disabled="disabled">
    <slot></slot>
  </v-btn>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  props: {
    handler: {
      type: Function,
      required: true,
    },
    disabled: {
      type: Boolean,
      required: false,
      default: false,
    },
  },
  methods: {
    onClick() {
      if (this.isAuth) {
        this.handler();
      } else {
        this.$swal({ icon: "info", text: "Vous devez vous connecter" });
      }
    },
  },
  computed: {
    isAuth(): boolean {
      return this.$store.getters["auth/isConnected"];
    },
  },
});
</script>

<style scoped>
</style>