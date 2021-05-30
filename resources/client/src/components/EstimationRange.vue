<template>
  <v-range-slider
    :tick-labels="estimates"
    v-model="val"
    min="0"
    max="90"
    ticks="always"
    tick-size="4"
  >
    <template v-slot:thumb-label="props">
      <v-icon dark>
        {{ label(props.value) }}
      </v-icon>
    </template>
  </v-range-slider>
</template>

<script lang="ts">
import Vue from "vue";
import { IEstimate } from "@/interfaces/estimation.interface";

export default Vue.extend({
  data() {
    return {
      val: [0, 1] as any[],
    };
  },
  computed: {
    estimates(): IEstimate[] {
      return this.$store.getters["benefits/estimates"];
    },
    labels(): string[] {
      return this.$store.getters["benefits/estimates"].map(
        (elt: IEstimate) => elt.libelle
      );
    },
  },
  methods: {
    label(val: any) {
      const found = this.estimates.find((elt: IEstimate) => elt.id == val);

      return found ? found.libelle : null;
    },
  },
});
</script>

<style scoped>
</style>