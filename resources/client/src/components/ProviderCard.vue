<template>
  <base-card :title="provider.name" description="Son job" image="ok">
    <div class="d-flex justify-content-between align-items-center img-content">
      <div>
        <v-btn color="primary" class="discover-btn" small
          >Demander un devis</v-btn
        >
      </div>
      <div class="btn-container">
        <v-btn icon color="primary" outlined><v-icon>mdi-star</v-icon></v-btn>
        <v-btn icon color="primary" outlined><v-icon>mdi-phone</v-icon></v-btn>
      </div>
    </div>
  </base-card>
</template>

<script lang="ts">
import { IProvider } from "@/interfaces/provider.interface";
import Vue, { PropType } from "vue";
import BaseCard from "./BaseCard.vue";

export default Vue.extend({
  props: {
    provider: {
      type: Object as PropType<IProvider>,
      required: true,
    },
  },
  components: {
    BaseCard,
  },
});
</script>

<style scoped>
.img-content {
  margin: 4% 4% 0% 4%;
}
</style>
