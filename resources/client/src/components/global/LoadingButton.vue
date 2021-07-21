<template>
  <v-btn
    :color="color"
    :type="type"
    :disabled="loading"
    :block="block"
    @click="handler"
  >
    <template v-if="loading">Veuillez patienter ... </template>
    <template v-else><slot></slot></template>
  </v-btn>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  props: {
    handler: {
      type: Function,
      required: false,
      default: null,
    },
    disabled: {
      type: Boolean,
      required: false,
      default: false,
    },
    type: {
      type: String,
      required: false,
      default: "button",
    },
    color: {
      type: String,
      required: false,
      default: "primary",
    },
    block: {
      type: Boolean,
      default: false,
    },
  },
  computed: {
    loading(): boolean {
      return this.$store.state.loading;
    },
  },
});
</script>

<style scoped>
</style>