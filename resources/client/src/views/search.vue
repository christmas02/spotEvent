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
                  v-model="form.prestation"
                  item-text="name"
                  item-value="id"
                ></v-autocomplete>
              </div>
              <div class="mx-2">
                <v-autocomplete
                  label="Estimation minimale"
                  v-model="form.min"
                  filled
                  :items="estimates"
                  item-text="libelle"
                  item-value="id"
                ></v-autocomplete>
              </div>
              <div>
                <v-autocomplete
                  label="Estimation maximale"
                  v-model="form.max"
                  filled
                  :items="estimates"
                  item-text="libelle"
                  item-value="id"
                ></v-autocomplete>
              </div>
            </div>
          </div>
          <div style="margin: 50px 0">
            <!-- <div class="loading" v-if="loading && benefits.length == 0"> -->
            <div class="loading" v-if="loading && benefits.length == 0">
              <v-progress-circular
                indeterminate
                color="amber"
              ></v-progress-circular>
            </div>
            <benefits-grid
              :benefits="isFilter ? filterResults : results"
              v-else-if="results.length >= 1"
            ></benefits-grid>
            <div class="nothing" v-else-if="nothingFinded">
              <!-- <div
              class="nothing"
              v-else-if="filterResults.length == 0 && isFilter"
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
      filterResults: [] as Benefit[],
      isFilter: false,
      form: {
        prestation: null as unknown as string,
        min: null as unknown as string,
        max: null as unknown as string,
        // localisation: null as unknown as string,
      } as FilterPayload,
      loading: false,
    };
  },
  async beforeMount(): Promise<void> {
    this.nothingFinded = false;
    this.loading = true;
    await Promise.all([
      this.prestationsSearchForm(),

      // this.$store.dispatch("benefits/prestationsSearchForm"),
      this.$store.dispatch("benefits/fetchCategories"),
      this.$store.dispatch("benefits/fetchEstimates"),
      // this.$store.dispatch("benefits/fetchProviders"),
    ]);
  },
  methods: {
    async prestationsSearchForm(): Promise<void> {
      this.loading = true;
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
        this.nothingFinded = true;
        this.results = [] as Benefit[];
        console.log("aucun resultat trouvé");
      }
      this.loading = false;
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

        if (mark > 0) this.isFilter = true;

        this.filterResults = this.results.filter((benefit) => {
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
