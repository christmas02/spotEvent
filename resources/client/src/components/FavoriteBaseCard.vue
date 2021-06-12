<template>
  <v-card class="mx-auto" :max-width="maxWidth" :min-width="minWidth">
    <v-img
      lazy-src="https://picsum.photos/id/11/10/6"
      :src="image"
      height="250px"
    >
      <slot></slot>
    </v-img>

    <v-card-title class="the-title">
      {{ name }}
    </v-card-title>

    <v-card-subtitle class="subtitle">
      <p>ENTREPRISE : {{ entreprise }}</p>
      <p>PRESTATION: {{ prestation }}</p>
    </v-card-subtitle>
  </v-card>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  props: {
    maxWidth: {
      type: String,
      default: "344",
    },
    minWidth: {
      type: String,
      default: "auto",
    },
    name: {
      type: String,
      required: true,
    },
    entreprise: {
      type: String,
      required: true,
    },
    prestation: {
      type: String,
      required: true,
    },
    image: {
      type: String,
      required: true,
    },
  },
});
</script>

<style scoped>
.the-title {
  font-size: 1.4rem !important;
  color: var(--primary);
  margin-bottom: 8px;
}

.subtitle p {
  color: #000 !important;
  font-weight: 600;
  display: block; /* or inline-block */
  overflow: hidden;
  text-overflow: ellipsis;
  max-height: 4.5em;
}
</style>
