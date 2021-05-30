<template>
  <base-card
    max-width="90%"
    :description="benefit.presentation"
    :title="benefit.name.toUpperCase()"
    :image="createImagePath(benefit.path_img)"
  >
    <v-btn
      color="primary"
      class="discover-btn"
      small
      :to="{ name: 'benefit', params: { id: benefit.id } }"
      >Découvrir</v-btn
    >
  </base-card>
</template>

<script lang="ts">
import { Benefit } from "@/interfaces/benefit.interface";
import Vue, { PropType } from "vue";
import BaseCard from "./BaseCard.vue";
import utilsMixin from "@/mixins/utils.mixin";

export default Vue.extend({
  mixins: [utilsMixin],
  props: {
    benefit: {
      type: Object as PropType<Benefit>,
      required: true,
    },
  },
  components: {
    BaseCard,
  },
});
</script>

<style scoped>
.discover-btn {
  position: absolute;
  top: 8%;
  left: 6%;
  color: #000 !important;
}
</style>
