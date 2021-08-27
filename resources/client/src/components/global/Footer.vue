<template>
  <footer class="my-footer default-padding">
    <div class="row">
      <div class="col-md-4">
        <div>
          <v-img
            style="width: 50%"
            :src="require('../../assets/light-logo.png')"
          ></v-img>
        </div>
        <p>
          Constituez votre "équipe qui gagne" pour votre mariage grâce à Spot
          Event, l'annuaire nuptial digital
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
            <ul class="footer-list">
              <li>
                <h4 class="list-title">Prestations</h4>
              </li>

              <li v-for="benefit in benefits" :key="benefit.id">
                <a class="footer-link" @click="discover(benefit)">{{
                  benefit.prestation
                }}</a>
              </li>
            </ul>
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
      return this.$store.getters["benefits/categories"];
    },
    benefits(): Benefit[] {
      return this.$store.getters["benefits/all"].slice(0, 12);
    },
  },
  methods: {
    async discover(benefit: Benefit): Promise<void> {
      const service = new AppService();
      const id_user = this.$store.getters["auth/id"];
      const { statu } = await service.benefitClick({
        id_user,
        id_pres: benefit.id_user.toString(),
      });

      // console.log(statu,");
      // console.log(statu, this.benefit.id_user.toString());

      if (statu == 1) {
        // console.log(slugify(this.benefit.name));

        sessionStorage.setItem("benefitId", benefit.id.toString());
        // console.log("uniikk");
        this.$router.push({
          name: "benefit",
          params: { slug: slugify(benefit.name) },
        });
      }
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
