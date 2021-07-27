<template>
  <default-layout>
    <div id="homepage">
      <div class="main psearch">
        <search-form :handler="prestationsSearchForm"></search-form>
      </div>

      <div class="main mx-auto">
        <div class="d-block d-md-none mx-auto">
          <search-form :handler="prestationsSearchForm"></search-form>
        </div>
        <div class="section">
          <div style="margin: 50px 0">
            <!-- <div class="loading" v-if="loading && benefits.length == 0"> -->
            <div class="loading" v-if="loading && benefits.length == 0">
              <v-progress-circular
                indeterminate
                color="amber"
              ></v-progress-circular>
            </div>
            <div v-else-if="results.length >= 1">
              <benefits-grid
                :benefits="isFilter ? allBenefits : results"
              ></benefits-grid>
              <v-pagination
                v-if="results.length > perPage"
                class="py-5"
                v-model="page"
                :length="paginateLength"
                prev-icon="mdi-menu-left"
                next-icon="mdi-menu-right"
              ></v-pagination>
            </div>

            <div class="nothing" v-else-if="nothingFinded">
              <!-- <div
              class="nothing"
              v-else-if="allBenefits.length == 0 && isFilter"
            > -->
              <p class="display-2 font-weight-bold">Aucun resultat trouvé</p>
            </div>
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
import { ISearchForm } from "@/interfaces/app-services.interfaces";
import { AppService } from "@/services/app.service";
import { FilterPayload } from "../store/modules/benefits/interfaces/state.interface";

export default Vue.extend({
  name: "Search",
  components: {
    BenefitsGrid,
    ProvidersSlider,
    SearchForm,
    PrestationSearchForm,
  },
  data() {
    return {
      nothingFinded: false,
      results: [] as Benefit[],
      allBenefits: [] as Benefit[],
      // isFilter: false,
      form: {
        prestation: null as unknown as string,
        min: null as unknown as string,
        max: null as unknown as string,
        // localisation: null as unknown as string,
      } as FilterPayload,
      // loading: false,
      // allBenefits: [] as Benefit[],
      myBenefits: [] as Benefit[],
      page: 1,
      perPage: 2,
      benefitsLength: 0,
      paginateLength: 0,
      pages: [] as number[],
    };
  },
  async beforeMount(): Promise<void> {
    this.$store.commit("benefits/changeLoading", true);
    this.$store.commit("benefits/changeIsFilter", false);
    await Promise.all([
      this.prestationsSearchForm(),

      // this.$store.dispatch("benefits/prestationsSearchForm"),
      this.$store.dispatch("benefits/fetchCommunes"),
      this.$store.dispatch("benefits/fetchCategories"),
      this.$store.dispatch("benefits/fetchEstimates"),
      // this.$store.dispatch("benefits/fetchProviders"),
    ]);
    this.benefitsLength = this.results.length;
    this.paginateLength = Math.ceil(this.benefitsLength / this.perPage);
    this.pages = Object.keys(Array.apply(0, Array(this.benefitsLength))).map(
      Number
    );
  },
  methods: {
    async prestationsSearchForm(): Promise<void> {
      console.log("wano kuni");

      // this.loading = true;
      this.$store.commit("benefits/changeLoading", true);
      this.nothingFinded = false;
      const prestationsSearch = new AppService();

      // this.$store.commit("benefits/updatePrestationSearch");

      const data = new Object() as ISearchForm;

      data.localisation = this.$store.getters["benefits/choiceLocalisation"];
      data.estmation_max = this.$store.getters["benefits/choiceEstimateMax"];
      data.estmation_min = this.$store.getters["benefits/choiceEstimateMin"];
      data.id_prestation = "";
      if (this.$store.getters["benefits/choiceCategorie"]) {
        data.id_prestation =
          this.$store.getters["benefits/choiceCategorie"].toString();
      }

      const result = await prestationsSearch.getPrestationsSearchForm(data);
      console.log(result);

      if (result.statu == 1) {
        console.log("resultat");

        console.log(result.resultat);

        // commit("storeSearchResult", result.resultat);
        this.results = result.resultat;
      } else {
        console.log("faux");

        this.nothingFinded = true;
        this.results = [] as Benefit[];
        console.log("aucun resultat trouvé");
      }
      this.benefitsLength = this.results.length;
      this.paginateLength = Math.ceil(this.benefitsLength / this.perPage);
      this.pages = Object.keys(Array.apply(0, Array(this.benefitsLength))).map(
        Number
      );
      this.$store.commit("benefits/changeLoading", false);
    },
    makeFilter() {},
  },
  computed: {
    benefits(): Benefit[] {
      return this.$store.getters["benefits/all"];
    },
    categories(): ICategory[] {
      return this.$store.getters["benefits/categories"];
    },
    estimates(): IEstimate[] {
      return this.$store.getters["benefits/estimates"];
    },
    providers(): IProvider[] {
      return this.$store.getters["benefits/providers"];
    },
    visiblePages(): number[] {
      return this.pages.slice(
        (this.page - 1) * this.perPage,
        this.page * this.perPage
      );
    },
    isFilter(): IProvider[] {
      return this.$store.getters["benefits/isFilter"];
    },
    loading(): IProvider[] {
      return this.$store.getters["benefits/loading"];
    },
  },
  watch: {
    form: {
      handler(val: FilterPayload) {
        const filterValues = ["prestation"];
        let validKeys: string[] = [];
        for (const key of filterValues) {
          // @ts-ignore
          if (val[key]) validKeys = [...validKeys, key];
        }

        const mark = validKeys.length;

        if (mark > 0) this.$store.commit("benefits/changeIsFilter", true);

        this.allBenefits = this.results.filter((benefit) => {
          let myMark = 0;
          for (const key in validKeys) {
            // @ts-ignore
            if (benefit[key] == val[key]) {
              myMark++;
            }
          }
          if (myMark === mark) {
            return true;
          }
          return false;
        });
      },
      deep: true,
    },
  },
});
</script>

<style>
#homepage .nothing {
  text-align: center;
  vertical-align: middle;
}

#homepage .section {
  margin: 50px 0;
}
#homepage .psearch {
  margin-top: 80px;
  display: flex;
  justify-content: center;
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
