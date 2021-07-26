<template>
  <div class="row">
    <div
      class="col-md-3"
      v-for="prestataire in prestataires"
      :key="prestataire.id"
    >
      <prestataire-card :prestataire="prestataire"></prestataire-card>
    </div>
  </div>
</template>

<script lang="ts">
import Vue, { PropType } from "vue";
import { IProvider } from "../interfaces/provider.interface";
import PrestataireCard from "./PrestataireCard.vue";
export default Vue.extend({
  props: {
    prestataires: {
      type: Array as PropType<IProvider[]>,
      required: true,
    },
  },
  components: {
    PrestataireCard,
  },
});
</script>

<style scoped></style>
