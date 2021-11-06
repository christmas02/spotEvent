<template>
  <div>
    <!-- <v-carousel hide-delimiters height="250" v-if="items.length > 0">
      <v-carousel-item
        v-for="(item, i) in items"
        :key="i"
        :src="'/storage/' + item.path"
      ></v-carousel-item>
    </v-carousel> -->
    <div v-if="items.length > 0">
      <v-img
        :src="'/spotevent/public/storage/' + items[0].path"
        height="350"
        :width="width"
        aspect-ratio="1"
      ></v-img>
      <!-- <v-img :src="require(`${test}`)" height="250"></v-img> -->
    </div>
  </div>
  <!-- :src="'/spotevent/public/storage/' + item.path" -->
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
        // {
        //   src: "https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg",
        // },
        // {
        //   src: "https://cdn.vuetifyjs.com/images/carousel/sky.jpg",
        // },
        // {
        //   src: "https://cdn.vuetifyjs.com/images/carousel/bird.jpg",
        // },
        // {
        //   src: "https://cdn.vuetifyjs.com/images/carousel/planet.jpg",
        // },
      ] as IListPub[],
      // ] as IListPub[],
    };
  },
  // mounted() {
  //   this.test = "./../assets/images/jmbg2.png";
  // },
  props: {
    routeName: {
      type: String,
      required: true,
    },
    width: {
      type: String,
      required: false,
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
        let data = result.listContenue;
        console.log(result.listContenue, "list pubs");
        if (this.routeName === "Home" && data.length > 0) {
          this.items = data.filter(
            (el) => el.page == "Page accueil" && el.position == 1
          );
        } else if (this.routeName === "benefit" && data.length > 0) {
          this.items = data.filter(
            (el) => el.page == "Détail prestataire" && el.position == 4
          );
        } else if (this.routeName === "SeeMore" && data.length > 0) {
          this.items = data.filter(
            (el) => el.page == "Page catégorie" && el.position == 2
          );
        } else if (this.routeName === "listePrestataires" && data.length > 0) {
          this.items = data.filter(
            (el) => el.page == "Page prestataire" && el.position == 3
          );
        }
      } else {
        console.log(result, " pubs echec");
        let dt = {} as IListPub;
        dt.path = "defaultPub.jpg";
        dt.id = 0;
        dt.page = "";
        dt.position = 0;
        dt.created_at = "";
        dt.updated_at = "";
        this.items.push(dt);
      }

      // return "0";
    },
  },
  async beforeMount() {
    console.log("potattoo");

    await this.findPubs();
  },
});
</script>

<style scoped>
.borde {
  border: 1px solid;
}
</style>
