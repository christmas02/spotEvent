<template>
  <default-layout>
    <div id="homepage">
      <div class="d-none d-md-block">
        <jumbotron image="images/jmbg1.png">
          <div>
            <h1 class="content-title" v-html="contents.accueil_titre"></h1>
            <p
              class="content-subtitle my-5 col-md-10"
              v-html="contents.accueil_sous_titre"
            ></p>
            <div>
              <v-btn
                color="primary"
                :to="{ name: 'auth-register' }"
                v-if="!isAuth"
                >Découvrir</v-btn
              >
            </div>
          </div>
        </jumbotron>
      </div>

      <div class="main mx-auto">
        <!-- <div class="d-none d-sm-block d-md-none">
          <search-form :handler="initSearch"></search-form>
        </div> -->
        <div class="d-block d-md-none expansion">
          <expansion-filter></expansion-filter>
        </div>
        <div class="section my-10">
          <filter-form></filter-form>
          <div>
            <div class="loading" v-if="loading && benefits.length == 0">
              <v-progress-circular
                indeterminate
                color="amber"
              ></v-progress-circular>
            </div>
            <benefits-grid
              :benefits="benefits"
              v-else-if="benefits.length >= 1"
            ></benefits-grid>
            <div class="nothing" v-else-if="benefits.length == 0 && isFilter">
              <p class="display-2 font-weight-bold">Aucun resultat trouvé</p>
            </div>
          </div>
          <div class="text-center">
            <!-- <v-btn color="primary" v-if="benefits.length >= 13" @click="seeMore"
              >Voir plus</v-btn
            > -->
            <v-btn color="primary" class="mt-4" @click="seeMore"
              >Voir plus</v-btn
            >
          </div>
        </div>
        <div>
          <!-- <h2 class="section-title">Panneau publicitaire</h2> -->
          <!-- <div class="my-5">
            <div>
              <v-img
                src='/images/jmbg2.png'
                height="250"
              ></v-img>
            </div>
          </div> -->
          <pub :routeName="routeName"></pub>
        </div>

        <div class="section mt-0 d-none d-md-block mt-10">
          <div>
            <h2 class="section-title">Prestataires</h2>
          </div>
          <div style="margin: 50px 0">
            <providers-slider></providers-slider>
          </div>
          <div class="text-center">
            <v-btn color="primary" @click="seeMore"
              >Découvir tous les prestataires</v-btn
            >
          </div>
        </div>
      </div>
    </div>
  </default-layout>
</template>

<script lang="ts">
import Vue from "vue";
import BenefitsGrid from "@/components/BenefitsGrid.vue";
import pub from "@/components/pub.vue";
import ProvidersSlider from "@/components/ProvidersSlider.vue";
import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";
import SearchForm from "../components/forms/SearchForm.vue";
import FilterForm from "@/components/forms/FilterForm.vue";
// import expansionPanel from "@/components/expansionPanel.vue";
import expansionFilter from "@/components/expansionFilter.vue";

export default Vue.extend({
  name: "Home",
  components: {
    BenefitsGrid,
    ProvidersSlider,
    SearchForm,
    FilterForm,
    // expansionPanel,
    expansionFilter,
    pub,
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
      this.$store.dispatch("benefits/fetchCommunes"),
      this.$store.dispatch("benefits/fetchEstimates"),
      this.$store.dispatch("benefits/fetchProviders"),
    ]);
  },
  computed: {
    routeName(): string {
      return this.$route.name ? this.$route.name : "";
    },
    benefits(): Benefit[] {
      return this.$store.getters["benefits/all"].slice(0, 12);
      // return this.$store.getters["benefits/all"]
      //   ? this.$store.getters["benefits/all"].slice(0, 12)
      //   : ([] as Benefit[]);
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
    contents(): any {
      return this.$store.getters["homeContents"];
    },
  },
  methods: {
    initSearch(): void {
      this.$router.push({ name: "Search" });
    },
    seeMore(): void {
      this.$router.push({ name: "SeeMore" });
    },
    // async getfilterByCategory(): Promise<void> {
    //   // this.isFilter = true;
    //   this.$store.commit("benefits/changeIsFilter", true);
    //   // this.loading = true;
    //   this.$store.commit("benefits/changeLoading", true);
    //   const prestationsSearch = new AppService();

    //   const Cat = new Object() as IIdPrestation;
    //   Cat.id_prestation = this.categorie;

    //   const result = await prestationsSearch.filterByCategory(Cat);
    //   console.log(result);

    //   if (result.statu == 1) {
    //     console.log("resultat");

    //     this.$store.commit("benefits/store", result.resultat);
    //   } else {
    //     console.log(result.resultat);
    //     this.$store.commit("benefits/store", result.resultat);
    //     // this.loading = false;
    //     this.$store.commit("benefits/changeLoading", false);
    //   }
    // },
    // resetBenefits: function () {
    //   // this.isFilter = false;
    //   this.$store.commit("benefits/changeIsFilter", false);
    //   this.categorie = "";
    //   this.$store.commit("benefits/store", []);

    //   this.$store.dispatch("benefits/fetchAll");
    // },
  },
  // watch: {
  //   categorie: function (newValue, oldValue) {
  //     // console.log(newValue);
  //     if (newValue) {
  //       this.getfilterByCategory();
  //     }
  //   },
  // },
});
</script>

<style scoped>
.expansion {
  width: 90%;
  margin-right: auto;
  margin-left: auto;
}
#homepage .section {
  margin: 50px 0;
}
#homepage .nothing {
  text-align: center;
  vertical-align: middle;
}

@media screen and (min-width: 1264px) {
  #homepage .section {
    margin: 136px 0 136px 0;
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
