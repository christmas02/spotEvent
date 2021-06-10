<template>
  <default-layout>
    <div id="homepage">
      <div class="main psearch">
        <prestation-search-form></prestation-search-form>
      </div>

      <div class="main mx-auto">
        <div class="d-block d-md-none">
          <search-form></search-form>
        </div>
        <div class="section">
          <div class="d-flex justify-content-between">
            <div class="actions-container d-none d-md-flex">
              <div>
                <v-btn color="primary" x-large>Toutes les prestations</v-btn>
              </div>
              <div class="mx-2">
                <v-autocomplete
                  label="Catégories"
                  filled
                  :items="categories"
                  item-text="name"
                  item-value="id"
                ></v-autocomplete>
              </div>
              <div class="mx-2">
                <v-autocomplete
                  label="Estimation minimale"
                  filled
                  :items="estimatess"
                  item-text="libelle"
                  item-value="id"
                ></v-autocomplete>
              </div>
              <div>
                <v-autocomplete
                  label="Estimation maximale"
                  filled
                  :items="estimatess"
                  item-text="libelle"
                  item-value="id"
                ></v-autocomplete>
              </div>
            </div>
          </div>
          <div style="margin: 50px 0">
            <benefits-grid :benefits="benefits"></benefits-grid>
          </div>
          <div class="text-center">
            <v-btn color="primary">Voir plus</v-btn>
          </div>
        </div>
        <div class="section mt-0 d-none d-md-block">
          <div>
            <h2 class="section-title">Prestataires</h2>
          </div>
          <div style="margin: 50px 0">
            <providers-slider></providers-slider>
          </div>
          <div class="text-center">
            <v-btn color="primary">Découvir tous les prestataires</v-btn>
          </div>
        </div>
      </div>
    </div>
  </default-layout>
</template>

<script lang="ts">
import Vue from "vue";
import BenefitsGrid from "@/components/BenefitsGrid.vue";
import ProvidersSlider from "@/components/ProvidersSlider.vue";
import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";
import SearchForm from "../components/forms/SearchForm.vue";
import PrestationSearchForm from "../components/forms/PrestationSearchForm.vue";

export default Vue.extend({
  name: "Home",
  components: {
    BenefitsGrid,
    ProvidersSlider,
    SearchForm,
    PrestationSearchForm,
  },
  async beforeMount(): Promise<void> {
    await Promise.all([
      // this.$store.dispatch("benefits/prestationsSearchForm"),
      this.$store.dispatch("benefits/fetchAll"),
      this.$store.dispatch("benefits/fetchCategories"),
      this.$store.dispatch("benefits/fetchEstimates"),
      this.$store.dispatch("benefits/fetchProviders"),
    ]);
  },
  computed: {
    benefits(): Benefit[] {
      return this.$store.getters["benefits/all"];
    },
    categories(): ICategory[] {
      return this.$store.getters["benefits/categories"];
    },
    estimatess(): IEstimate[] {
      return this.$store.getters["benefits/estimates"];
    },
    providers(): IProvider[] {
      return this.$store.getters["benefits/providers"];
    },
  },
});
</script>

<style>
#homepage .section {
  margin: 50px 0;
}
#homepage .psearch {
  margin-top: 80px;
}

@media screen and (min-width: 1264px) {
  #homepage .section {
    margin: 136px 0;
  }
}

#homepage .actions-container button {
  margin-left: 10px;
}

#homepage .search-container {
  position: absolute;
  bottom: -33px;
  left: 5%;
  width: 100%;
}
</style>
