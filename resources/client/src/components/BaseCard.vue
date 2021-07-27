<template>
  <v-card class="mx-auto" :max-width="maxWidth" :min-width="minWidth">
    <v-img
      lazy-src="https://picsum.photos/id/11/10/6"
      :src="image"
      height="250px"
    >
      <slot></slot>
    </v-img>
    <!-- <div class="row"> -->

    <v-card-title class="the-title">
      {{ rating ? title.toUpperCase() : title }}
    </v-card-title>
    <div
      flat
      class="d-flex nowrap justify-space-between pb-5 px-5"
      v-if="rating"
    >
      <p class="mb-0 categorie">{{ description }}</p>
      <v-rating
        v-if="rating"
        v-model="rating"
        size="15"
        readonly
        :length="rating"
        background-color="primary"
        color="primary"
      ></v-rating>
    </div>

    <v-card-subtitle class="subtitle" v-if="!rating">
      <p>{{ description }}</p>
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
    title: {
      type: String,
      default: "AUCUN NOM ENTREPRISE",
      required: false,
    },
    description: {
      type: String,
      required: false,
      default: "Aucune description",
    },
    image: {
      type: String,
      required: true,
    },
    rating: {
      type: Number,
      required: false,
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
.categorie {
  font-weight: 600;
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
