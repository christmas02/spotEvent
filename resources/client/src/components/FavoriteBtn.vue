<template>
  <v-btn
    icon
    :color="color"
    x-large
    outlined
    rounded
    class="btn-icon"
    @click="toggleFavorite"
    :disabled="benefit.favoris != 1 || !auth"
  >
    <v-icon>mdi-heart</v-icon>
  </v-btn>
</template>

<script lang="ts">
import Vue, { PropType } from "vue";
import { BenefitService } from "../services/benefit.service";
import { Benefit } from "../interfaces/benefit.interface";
export default Vue.extend({
  props: {
    benefit: {
      type: Object as PropType<Benefit>,
      required: true,
    },
  },
  methods: {
    async toggleFavorite() {
      const service = new BenefitService();
      const id_user = this.$store.getters["auth/id"];
      const { statu, listeFavoris } = await service.toggleFavorite({
        id_user,
        id_pres: this.benefit.id_user.toString(),
        // id_pres: this.benefit.id.toString(),
      });

      if (statu != 0) {
        this.$store.commit("auth/updateFavoritesList", listeFavoris);
      }
    },
  },
  computed: {
    color(): string {
      return this.$store.getters["auth/isFavorite"](this.benefit.id_user)
        ? "red"
        : "white";
    },
    auth(): boolean {
      return this.$store.getters["auth/isConnected"];
    },
  },
});
</script>

<style scoped>
</style>