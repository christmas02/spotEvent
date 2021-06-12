<template>
  <favorite-base-card
    max-width="90%"
    :entreprise="favorite.name_entreprise"
    :name="favorite.name"
    :prestation="favorite.prestation"
    :image="favorite.path_user | createImagePath"
  >
    <v-btn color="primary" class="discover-btn" small @click="discover"
      >Découvrir</v-btn
    >
  </favorite-base-card>
</template>

<script lang="ts">
import { INewFavorite } from "@/interfaces/favorite.interface";
import Vue, { PropType } from "vue";
import FavoriteBaseCard from "./FavoriteBaseCard.vue";
import utilsMixin from "@/mixins/utils.mixin";
import { AppService } from "../services/app.service";
export default Vue.extend({
  mixins: [utilsMixin],
  props: {
    favorite: {
      type: Object as PropType<INewFavorite>,
      required: true,
    },
  },
  components: {
    FavoriteBaseCard,
  },
  methods: {
    discover() {
      // const service = new AppService();
      // const id_user = this.$store.getters["auth/id"];
      // const { statu } = await service.benefitClick({
      //   id_user,
      //   id_pres: this.benefit.id_user.toString(),
      // });

      // console.log(statu);

      // if (statu == 1) {
      // this.$router.push({
      //   name: "benefit",
      //   params: { id: this.benefit.id.toString() },
      // });
      console.log("vide");
      // }
    },
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
