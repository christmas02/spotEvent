<template>
  <base-card
    max-width="90%"
    :rating="2"
    :title="
      prestataire.name_entreprise
        ? prestataire.name_entreprise
        : 'ENTREPRISE VIDE'
    "
    :description="
      prestataire.prestation ? prestataire.prestation : 'Categorie Vide'
    "
    :image="prestataire.path_user | createImagePath"
  >
    <div class="d-flex justify-content-between align-items-center img-content">
      <div>
        <v-btn color="primary" class="discover-btn" small
          >Demander un devis</v-btn
        >
      </div>
      <div class="btn-container">
        <v-btn icon :color="color" outlined><v-icon>mdi-heart</v-icon></v-btn>
        <v-btn icon color="primary" outlined><v-icon>mdi-phone</v-icon></v-btn>
      </div>
    </div>
  </base-card>
</template>

<script lang="ts">
import { IProvider } from "../interfaces/provider.interface";
import Vue, { PropType } from "vue";
import BaseCard from "./BaseCard.vue";
import utilsMixin from "@/mixins/utils.mixin";
export default Vue.extend({
  mixins: [utilsMixin],
  props: {
    prestataire: {
      type: Object as PropType<IProvider>,
      required: true,
    },
  },
  components: {
    BaseCard,
  },
  computed: {
    color(): string {
      return this.$store.getters["auth/isFavorite"](this.prestataire.id)
        ? "red"
        : "white";
    },
  },
});
</script>

<style scoped>
.img-content {
  margin: 4% 4% 0% 4%;
}
</style>
