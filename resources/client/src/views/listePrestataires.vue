<template>
  <default-layout>
    <div id="homepage">
      <div class="d-none d-md-block">
        <jumbotron image="images/jmbg1.png">
          <h1 class="content-title">
            L' organisation zen <br />de vos événements
          </h1>
          <p class="content-subtitle my-5">
            les prestataires n'attendent que vous
          </p>
          <div>
            <v-btn
              color="primary"
              :to="{ name: 'auth-register' }"
              v-if="!isAuth"
              >Découvrir</v-btn
            >
          </div>
          <template #append>
            <div class="search-container">
              <search-form :handler="initSearch"></search-form>
            </div>
          </template>
        </jumbotron>
      </div>

      <div class="main mx-auto">
        <div class="d-block d-md-none">
          <search-form :handler="initSearch"></search-form>
        </div>

        <div class="section">
          <filter-form></filter-form>
          <div style="margin: 50px 0">
            <div class="loading" v-if="loading && providers.length == 0">
              <v-progress-circular
                indeterminate
                color="amber"
              ></v-progress-circular>
            </div>
            <prestataires-grid
              :prestataires="providers"
              v-else-if="providers.length >= 1"
            ></prestataires-grid>
            <div class="nothing" v-else-if="providers.length == 0 && isFilter">
              <p class="display-2 font-weight-bold">Aucun resultat trouvé</p>
            </div>
          </div>
          <!-- <div class="text-center">
            <v-btn color="primary" v-if="providers.length >= 1" @click="seeMore"
              >Voir plus</v-btn
            >
          </div> -->
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
import PrestatairesGrid from "@/components/PrestatairesGrid.vue";
import ProvidersSlider from "@/components/ProvidersSlider.vue";
import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";
import SearchForm from "../components/forms/SearchForm.vue";
import FilterForm from "@/components/forms/FilterForm.vue";
import { AppService } from "@/services/app.service";
import { IIdPrestation } from "@/interfaces/app-services.interfaces";

export default Vue.extend({
  name: "Home",
  components: {
    BenefitsGrid,
    PrestatairesGrid,
    ProvidersSlider,
    SearchForm,
    FilterForm,
  },
  data() {
    return {
      categorie: null as unknown as string,
      // isFilter: false,
    };
  },
  async beforeMount(): Promise<void> {
    this.$store.commit("benefits/resetSearchForm");
    // this.loading = true;
    this.$store.commit("benefits/changeLoading", true);
    this.$store.commit("benefits/changeIsFilter", false);
    await Promise.all([
      this.$store.dispatch("benefits/fetchAll"),
      this.$store.dispatch("benefits/fetchCategories"),
      //   this.$store.dispatch("benefits/fetchCommunes"),
      this.$store.dispatch("benefits/fetchEstimates"),
      this.$store.dispatch("benefits/fetchProviders"),
    ]);
  },
  computed: {
    benefits(): Benefit[] {
      return this.$store.getters["benefits/all"];
    },
    isAuth() {
      return this.$store.getters["auth/isConnected"];
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
    loading(): IProvider[] {
      return this.$store.getters["benefits/loading"];
    },
    isFilter(): IProvider[] {
      return this.$store.getters["benefits/isFilter"];
    },
  },
  methods: {
    initSearch(): void {
      this.$router.push({ name: "Search" });
    },
    seeMore(): void {
      this.$router.push({ name: "SeeMore" });
    },
    async getfilterByCategory(): Promise<void> {
      // this.isFilter = true;
      this.$store.commit("benefits/changeIsFilter", true);
      // this.loading = true;
      this.$store.commit("benefits/changeLoading", true);
      const prestationsSearch = new AppService();

      const Cat = new Object() as IIdPrestation;
      Cat.id_prestation = this.categorie;

      const result = await prestationsSearch.filterByCategory(Cat);
      console.log(result);

      if (result.statu == 1) {
        console.log("resultat");

        this.$store.commit("benefits/store", result.resultat);
      } else {
        console.log(result.resultat);
        this.$store.commit("benefits/store", result.resultat);
        // this.loading = false;
        this.$store.commit("benefits/changeLoading", false);
      }
    },
    resetBenefits: function () {
      // this.isFilter = false;
      this.$store.commit("benefits/changeIsFilter", false);
      this.categorie = "";
      this.$store.commit("benefits/store", []);

      this.$store.dispatch("benefits/fetchAll");
    },
  },
  watch: {
    categorie: function (newValue, oldValue) {
      // console.log(newValue);
      if (newValue) {
        this.getfilterByCategory();
      }
    },
  },
});
</script>

<style>
#homepage .section {
  margin: 50px 0;
}
#homepage .nothing {
  text-align: center;
  vertical-align: middle;
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

#homepage .v-progress-circular {
  margin: 1rem;
  text-align: center;
}
#homepage .loading {
  width: 100%;
  height: 40vh;
  display: flex;
  flex-flow: column nowrap;
  align-items: center;
  justify-content: center;
}
</style>
