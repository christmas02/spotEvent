<template>
  <base-card
    max-width="90%"
    :description="benefit.presentation"
    :title="benefit.name.toUpperCase()"
    :image="benefit.path_img | createImagePath"
  >
    <v-btn color="primary" class="discover-btn" small @click="discover"
      >Découvrir</v-btn
    >
  </base-card>
</template>

<script lang="ts">
import { Benefit } from "@/interfaces/benefit.interface";
import Vue, { PropType } from "vue";
import BaseCard from "./BaseCard.vue";
import utilsMixin from "@/mixins/utils.mixin";
import { AppService } from "../services/app.service";
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
  methods: {
    async discover(): Promise<void> {
      const service = new AppService();
      const id_user = this.$store.getters["auth/id"];
      const { statu } = await service.benefitClick({
        id_user,
        id_pres: this.benefit.id_user.toString(),
      });

      console.log(statu, "uddoiop");

      if (statu == 1) {
        this.$router.push({
          name: "benefit",
          params: { id: this.benefit.id.toString() },
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
</style>
