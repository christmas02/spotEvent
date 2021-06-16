<template>
  <default-layout>
    <div id="homepage">
      <div class="main psearch">
        <search-form :handler="initSearch"></search-form>
      </div>

      <div class="main mx-auto">
        <div class="d-block d-md-none">
          <search-form :handler="initSearch"></search-form>
        </div>
        <div class="section">
          <!-- <div class="d-flex justify-content-between">
            <div>
              <h2 class="section-title">Prestations</h2>
            </div>
            <div class="actions-container d-none d-md-flex">
              <div>
                <v-btn color="primary" @click="resetBenefits()" x-large
                  >Toutes les prestations</v-btn
                >
              </div>
              <div class="mx-2">
                <v-autocomplete
                  v-model="categorie"
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
          </div> -->
          <div style="margin: 50px 0">
            <div class="loading" v-if="loading && benefits.length == 0">
              <v-progress-circular
                indeterminate
                color="amber"
              ></v-progress-circular>
            </div>
            <div v-else-if="allBenefits.length >= 1">
              <benefits-grid :benefits="allBenefits"></benefits-grid>
              <v-pagination
                class="py-5"
                v-model="page"
                :length="paginateLength"
                prev-icon="mdi-menu-left"
                next-icon="mdi-menu-right"
              ></v-pagination>
            </div>
            <div class="nothing" v-else-if="benefits.length == 0 && isFilter">
              <p class="display-2 font-weight-bold">Aucun resultat trouvé</p>
            </div>
          </div>
          <div class="text-center">
            <v-btn color="primary" v-if="benefits.length >= 1">Voir plus</v-btn>
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
import { AppService } from "@/services/app.service";
import { IIdPrestation } from "@/interfaces/app-services.interfaces";

export default Vue.extend({
  name: "Home",
  components: {
    BenefitsGrid,
    ProvidersSlider,
    SearchForm,
  },
  data() {
    return {
      categorie: null as unknown as string,
      isFilter: false,
      loading: false,

      allBenefits: [] as Benefit[],
      myBenefits: [] as Benefit[],
      page: 1,
      perPage: 2,
      benefitsLength: 0,
      paginateLength: 0,
      pages: [] as number[],
    };
  },
  async beforeMount(): Promise<void> {
    this.$store.commit("benefits/resetSearchForm");
    this.loading = true;
    await Promise.all([
      this.$store.dispatch("benefits/fetchAll"),
      this.$store.dispatch("benefits/fetchCategories"),
      this.$store.dispatch("benefits/fetchEstimates"),
      this.$store.dispatch("benefits/fetchProviders"),
    ]);
    this.benefitsLength = this.$store.getters["benefits/all"].length;
    this.paginateLength = Math.ceil(this.benefitsLength / this.perPage);
    this.pages = Object.keys(Array.apply(0, Array(this.benefitsLength))).map(
      Number
    );
  },
  computed: {
    benefits(): Benefit[] {
      this.allBenefits = this.$store.getters["benefits/all"];
      this.myBenefits = this.$store.getters["benefits/all"];
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
    visiblePages() {
      return this.pages.slice(
        (this.page - 1) * this.perPage,
        this.page * this.perPage
      );
    },
  },
  methods: {
    initSearch(): void {
      this.$router.push({ name: "Search" });
    },
    async getfilterByCategory(): Promise<void> {
      this.isFilter = true;
      this.loading = true;
      const prestationsSearch = new AppService();

      const Cat = new Object() as IIdPrestation;
      Cat.id_prestation = this.categorie;

      const result = await prestationsSearch.filterByCategory(Cat);
      console.log(result);

      if (result.statu == 1) {
        console.log("resultat");

        console.log(result.resultat);
        this.$store.commit("benefits/store", result.resultat);
      } else {
        console.log(result.resultat);
        this.$store.commit("benefits/store", result.resultat);
        this.loading = false;
      }
    },
    resetBenefits: function () {
      this.isFilter = false;
      console.log("reset");
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
    visiblePages: function (value, prevValue) {
      this.allBenefits = this.myBenefits.slice(
        (this.page - 1) * this.perPage,
        this.page * this.perPage
      );
    },
  },
  // watch(visiblePages, (value, prevValue) => {
  //     state.allOrders = state.myOrders.slice(
  //       (state.page - 1) * state.perPage,
  //       state.page * state.perPage
  //     );
  //   });
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
