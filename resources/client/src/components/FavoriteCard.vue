<template>
  <favorite-base-card
    max-width="90%"
    :title="favorite.name"
    :description="favorite.presentation"
    :image="favorite.path_img | createImagePath"
  >
    <div class="d-flex postion">
      <v-btn color="primary" class="discover-btn" small @click="discover"
        >Découvrir</v-btn
      >
      <div>
        <favorite-modal-btn
          :idPrestataire="favorite.id_user"
        ></favorite-modal-btn>
      </div>
    </div>
  </favorite-base-card>
</template>

<script lang="ts">
import { INewFavorite } from "@/interfaces/favorite.interface";
import Vue, { PropType } from "vue";
import FavoriteBaseCard from "./FavoriteBaseCard.vue";
import FavoriteModalBtn from "./FavoriteModalBtn.vue";
import utilsMixin from "@/mixins/utils.mixin";
import { AppService } from "../services/app.service";
import { Benefit } from "../interfaces/benefit.interface";
export default Vue.extend({
  mixins: [utilsMixin],
  props: {
    favorite: {
      type: Object as PropType<Benefit>,
      required: true,
    },
  },
  components: {
    FavoriteBaseCard,
    FavoriteModalBtn,
  },
  methods: {
    async discover(): Promise<void> {
      const service = new AppService();
      const id_user = this.$store.getters["auth/id"];
      const { statu } = await service.benefitClick({
        id_user,
        id_pres: this.favorite.id_user.toString(),
      });

      console.log(statu);

      if (statu == 1) {
        this.$router.push({
          name: "benefit",
          params: { id: this.favorite.id.toString() },
        });
      }
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
.postion {
  justify-content: flex-end;
  padding: 5px;
}
</style>
