<template>
  <div class="d-flex justify-content-between">
    <div class="actions-container d-none d-md-flex">
      <div>
        <v-btn color="primary" @click="resetBenefits" x-large
          >Toutes les prestations</v-btn
        >
      </div>
      <div class="mx-2">
        <v-autocomplete
          v-model="categorie"
          label="Prestations"
          filled
          :items="categories"
          item-text="name"
          item-value="id"
        ></v-autocomplete>
      </div>
      <div class="mx-2">
        <v-autocomplete
          v-model="commune"
          label="Situation géographique"
          filled
          :items="communes"
          item-text="name"
          item-value="id"
        ></v-autocomplete>
      </div>
      <div class="mx-2">
        <v-autocomplete
          label="Estimation minimale"
          filled
          v-model="estmation_min"
          :items="estimatess"
          item-text="libelle"
          item-value="libelle"
        ></v-autocomplete>
      </div>
      <div>
        <v-autocomplete
          label="Estimation maximale"
          v-model="estmation_max"
          filled
          :items="estimatess"
          item-text="libelle"
          item-value="libelle"
        ></v-autocomplete>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue, { PropType } from "vue";
import { Benefit } from "../../interfaces/benefit.interface";
import { AppService } from "@/services/app.service";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";
import { IIdPrestation } from "@/interfaces/app-services.interfaces";

export default Vue.extend({
  data() {
    return {
      categorie: null as unknown as string,
      commune: null as unknown as string,
      isFilter: false,
      estmation_max: "" as string,
      estmation_min: "" as string,

      // loading: false,
    };
  },
  computed: {
    categories(): ICategory[] {
      return this.$store.getters["benefits/categories"];
    },
    estimatess(): IEstimate[] {
      return this.$store.getters["benefits/estimates"];
    },
    providers(): IProvider[] {
      return this.$store.getters["benefits/providers"];
    },
    communes(): ICategory[] {
      return this.$store.getters["benefits/communes"];
    },
  },
  methods: {
    async getfilterByCategory(): Promise<void> {
      // this.isFilter = true;
      // this.loading = true;
      this.$store.commit("benefits/changeLoading", true);
      const prestationsSearch = new AppService();

      const Cat = new Object() as IIdPrestation;
      Cat.id_prestation = this.categorie;

      const result = await prestationsSearch.filterByCategory(Cat);
      console.log(result);

      if (result.statu == 1) {
        console.log("resultatatcha");
        console.log("watcha");

        this.$store.commit("benefits/store", result.resultat);
      } else {
        console.log(result.resultat);
        this.$store.commit("benefits/store", result.resultat);
        // this.loading = false;
        this.$store.commit("benefits/changeLoading", false);
      }
      this.$store.commit("benefits/changeIsFilter", true);
      // this.benefitsLength = this.$store.getters["benefits/all"].length;
      // this.paginateLength = Math.ceil(this.benefitsLength / this.perPage);
      // this.pages = Object.keys(Array.apply(0, Array(this.benefitsLength))).map(
      //   Number
      // );
    },
    async getfilterByCommune(): Promise<void> {
      // this.isFilter = true;
      // this.loading = true;
      this.$store.commit("benefits/changeLoading", true);
      const prestationsSearch = new AppService();

      const Cat = new Object() as IIdPrestation;
      let commune = { id_commune: this.commune.toString() };

      const result = await prestationsSearch.filterByCommune(commune);
      console.log(result);

      if (result.statu == 1) {
        console.log("resultat commuen");

        this.$store.commit("benefits/store", result.resultat);
      } else {
        console.log(result.resultat);
        this.$store.commit("benefits/store", result.resultat);
        // this.loading = false;
        this.$store.commit("benefits/changeLoading", false);
      }
      this.$store.commit("benefits/changeIsFilter", true);
      // this.benefitsLength = this.$store.getters["benefits/all"].length;
      // this.paginateLength = Math.ceil(this.benefitsLength / this.perPage);
      // this.pages = Object.keys(Array.apply(0, Array(this.benefitsLength))).map(
      //   Number
      // );
    },
    async getfilterByEstimation(): Promise<void> {
      // this.isFilter = true;
      // this.loading = true;
      this.$store.commit("benefits/changeLoading", true);
      const prestationsSearch = new AppService();
      let min = this.estmation_min;
      let max = this.estmation_max;
      if (this.estmation_min == "") {
        min = this.estimatess[0].libelle;
      }
      // else if (this.estmation_max == "") {
      //   max = this.estimatess[this.estimatess.length - 1].libelle;
      // }
      let extimate = {
        estmation_max: max,
        estmation_min: min,
      };

      const result = await prestationsSearch.filterByEstimation(extimate);
      console.log(result);

      if (result.statu == 1) {
        console.log("extima");
        console.log(result.resultat);

        this.$store.commit("benefits/store", result.resultat);
      } else {
        console.log(result.resultat);
        this.$store.commit("benefits/store", result.resultat);
        // this.loading = false;
        this.$store.commit("benefits/changeLoading", false);
      }
      this.$store.commit("benefits/changeIsFilter", true);
    },
    resetBenefits() {
      // this.isFilter = false;
      this.$store.commit("benefits/changeIsFilter", false);
      this.categorie = "";
      this.commune = "";
      this.estmation_max = "";
      this.estmation_min = "";
      this.$store.commit("benefits/store", []);

      this.$store.dispatch("benefits/fetchAll");
    },
  },
  watch: {
    categorie(newValue, oldValue) {
      // console.log(newValue);
      if (newValue) {
        this.commune = "";
        this.estmation_max = "";
        this.estmation_min = "";
        this.getfilterByCategory();
      }
    },
    commune(newValue, oldValue) {
      if (newValue) {
        this.categorie = "";
        this.estmation_max = "";
        this.estmation_min = "";
        this.getfilterByCommune();
      }
    },
    estmation_max(newValue, oldValue) {
      if (newValue) {
        this.categorie = "";
        this.commune = "";
        this.getfilterByEstimation();
      }
    },
    estmation_min(newValue, oldValue) {
      if (newValue) {
        this.categorie = "";
        this.commune = "";
        // this.getfilterByEstimation();
      }
    },
  },
});
</script>

<style scoped>
</style>