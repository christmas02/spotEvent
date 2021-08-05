<template>
  <v-card
    class="mx-auto"
    :max-width="maxWidth"
    :min-width="minWidth"
    :class="customClass"
  >
    <v-img
      :lazy-src="require('../assets/dark-logo.png')"
      :src="image"
      height="250px"
    >
      <slot></slot>
    </v-img>
    <!-- <div class="row"> -->

    <v-card-title class="the-title">
      {{ rating ? title.toUpperCase() : title }}
    </v-card-title>
    <!-- class="d-flex nowrap justify-space-between pb-5 px-5" -->
    <div flat class="d-flex flex-column pb-5 px-5" v-if="rating">
      <p class="mb-0 categorie">{{ description }}</p>
      <div class="d-flex nowrap justify-space-between">
        <div class="mb-0 d-flex align-center">
          <span>{{ rating }}</span>
          <v-icon color="primary">mdi-star</v-icon>
        </div>

        <div class="mb-0 d-flex align-center">
          <span>{{ userRating }}</span>
          <v-icon>mdi-account</v-icon>
        </div>
      </div>
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
    customClass: {
      type: String,
      required: false,
    },
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
    //votant
    userRating: {
      type: Number,
      required: false,
      default: 0,
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
@media screen and (min-width: 961px) {
  .the-title {
    font-size: 1rem !important;
  }
}
</style>
