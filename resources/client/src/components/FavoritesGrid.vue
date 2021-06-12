<template>
  <div class="row">
    <div class="col-md-4" v-for="favorite in favorites" :key="favorite.id">
      <favorite-card :favorite="favorite"></favorite-card>
    </div>
  </div>
</template>

<script lang="ts">
import { INewFavorite } from "@/interfaces/favorite.interface";
import Vue, { PropType } from "vue";
import FavoriteCard from "./FavoriteCard.vue";
export default Vue.extend({
  props: {
    favorites: {
      type: Array as PropType<INewFavorite[]>,
      required: true,
    },
  },
  components: {
    FavoriteCard,
  },
});
</script>

<style scoped></style>
