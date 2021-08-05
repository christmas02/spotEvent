<template>
  <carousel-3d
    height="auto"
    space="250"
    autoplay
    controlsVisible
    perspective="0"
    animationSpeed="4000"
  >
    <slide :index="i" v-for="(provider, i) in providers" :key="provider.id">
      <prestataire-card :prestataire="provider"></prestataire-card>
    </slide>
  </carousel-3d>
</template>

<script lang="ts">
import Vue from "vue";
import { Carousel3d, Slide } from "vue-carousel-3d";
import PrestataireCard from "./PrestataireCard.vue";
import { IProvider } from "@/interfaces/provider.interface";

export default Vue.extend({
  components: {
    Carousel3d,
    Slide,
    PrestataireCard,
  },
  computed: {
    providers(): IProvider[] {
      return this.$store.getters["benefits/providers"];
    },
  },
});
</script>

<style>
.carousel-3d-slide.current {
  background: transparent !important;
  border: none;
}

.carousel-3d-slide {
  min-height: 400px;
  border-style: none;
  background-color: transparent;
}

.carousel-3d-slider {
  height: 400px;
}

.carousel-3d-controls .prev,
.carousel-3d-controls .next {
  background-color: var(--primary);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
