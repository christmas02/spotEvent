<template>
  <div class="my-5">
    <v-carousel hide-delimiters height="250">
      <v-carousel-item
        v-for="(item, i) in items"
        :key="i"
        :src="item.src"
      ></v-carousel-item>
    </v-carousel>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import {
  IListPub,
  IListPubResponse,
} from "../interfaces/app-services.interfaces";
import { AppService } from "../services/app.service";
export default Vue.extend({
  data() {
    return {
      test: require("./../assets/images/jmbg2.png"),

      items: [
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg",
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/sky.jpg",
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/bird.jpg",
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/planet.jpg",
        },
      ],
      // ] as IListPub[],
    };
  },
  // mounted() {
  //   this.test = "./../assets/images/jmbg2.png";
  // },
  props: {
    height: {
      type: String,
      required: false,
      default: "250",
    },
  },
  computed: {
    val() {
      return require(`${this.src}`);
    },
  },
  methods: {
    async findPubs(): Promise<void> {
      // Items have already been loade
      // Lazily load input items
      const service = new AppService();
      let urlParams = this.$route.params.slug;
      // console.log(urlParams);

      const result: IListPubResponse = await service.getPub();

      if (result.statu == 1) {
        console.log(result.listContenue, "list pubs");

        // this.items = result.listContenue as IListPub[];
      }
      // return "0";
    },
  },
  async beforeMount() {
    await this.findPubs();
  },
});
</script>

<style>
</style>