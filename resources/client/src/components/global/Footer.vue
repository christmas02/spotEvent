<template>
  <footer class="my-footer default-padding">
    <div class="row">
      <div class="col-md-4">
        <div>
          <v-img
            style="width: 50%; max-width: 180px"
            contain
            :src="require('../../assets/light-logo.png')"
          ></v-img>
        </div>
        <p>
          Constituez "l'équipe qui gagne" pour votre mariage grâce à Spot Event,
          l'annuaire nuptial digital
        </p>
        <div>
          <v-btn
            icon
            color="primary"
            href=" https://www.facebook.com/spoteventapp/"
            ><v-icon>mdi-facebook</v-icon></v-btn
          >
          <v-btn
            icon
            color="primary"
            href="https://www.instagram.com/spoteventapp/"
            ><v-icon>mdi-instagram</v-icon></v-btn
          >
        </div>
      </div>
      <div class="offset-md-1 col-md-7 d-none d-md-block">
        <div class="row mt-md-5">
          <div class="col-md-12">
            <h4 class="list-title mb-5">Prestations</h4>

            <div class="d-flex">
              <ul
                v-for="(listcategorie, i) in categories"
                :key="i"
                class="footer-list mr-5 px-0"
              >
                <li v-for="categorie in listcategorie" :key="categorie.id">
                  <a class="footer-link" @click="discover(categorie.id)">{{
                    categorie.name
                  }}</a>
                </li>
              </ul>
            </div>

            <!-- <div class="d-flex">
              <ul
                v-for="(listcategorie, i) in categories"
                :key="i"
                class="footer-list mr-5 px-0"
              >
                <li v-for="(categorie, i) in listcategorie" :key="i">
                  <a class="footer-link">{{ categorie }}</a>
                </li>
              </ul>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script lang="ts">
import { ICategory } from "@/interfaces/category.interface";
import slugify from "slugify";
import Vue from "vue";
import { Benefit } from "../../interfaces/benefit.interface";
import { AppService } from "../../services/app.service";
export default Vue.extend({
  name: "Footer",
  computed: {
    categories(): ICategory[] {
      let final = [];

      let elem = this.$store.getters["benefits/categories"];
      // let elem = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
      console.log(elem);
      let count = Math.floor(elem.length / 4);
      let lastIndex = 0;
      for (let index = 0; index < elem.length; index += 4) {
        console.log(index);
        final.push(elem.slice(index, index + 4));
        lastIndex = index;
      }
      console.log(final);

      console.log(final);

      // return this.$store.getters["benefits/categories"];
      return final;
    },
    benefits(): Benefit[] {
      return this.$store.getters["benefits/all"].slice(0, 12);
    },
  },
  methods: {
    discover(id: number) {
      this.$store.commit("benefits/updateChoiceCategorie", id);
      this.$router.push({ name: "Search" });
    },
  },
});
</script>

<style scoped>
.my-footer {
  background-color: #303749 !important;
  padding-top: 3%;
  padding-bottom: 5%;
  color: #fff;
}

.footer-list {
  list-style-type: none;
}

.footer-link {
  font-weight: 300;
  color: #fff;
  text-decoration: none;
}

li {
  margin-bottom: 15px;
}

p {
  margin-top: 40px;
  font-weight: 300;
}
</style>
