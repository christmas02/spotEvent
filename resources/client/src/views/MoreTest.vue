         


    <template>
  <default-layout>
    <div id="homepage">
      <div class="main psearch">
        <v-text-field
          outlined
          label="Je recherche une prestation"
          append-icon="mdi-account-search-outline"
        ></v-text-field>
      </div>

      <div class="main mx-auto">
        <div class="d-block d-md-none">
          <v-text-field
            outlined
            label="Je recherche une prestation"
            prepend-inner-icon="mdi-map-marker"
          ></v-text-field>
        </div>
        <div class="section">
          <filter-form></filter-form>
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
          <!-- <div class="text-center">
            <v-btn color="primary" v-if="benefits.length >= 1">Voir plus</v-btn>
          </div> -->
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
import FilterForm from "@/components/forms/FilterForm.vue";
import { IIdPrestation } from "@/interfaces/app-services.interfaces";

export default Vue.extend({
  name: "Home",
  components: {
    BenefitsGrid,
    ProvidersSlider,
    SearchForm,
    FilterForm,
  },
  data() {
    return {
      categorie: null as unknown as string,
      // isFilter: false,
      // loading: false,

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
    // this.loading = true;
    this.$store.commit("benefits/changeLoading", true);
    this.$store.commit("benefits/changeIsFilter", false);
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
  methods: {
    initSearch(): void {
      this.$router.push({ name: "Search" });
    },
    resetBenefits: function () {
      // this.isFilter = false;
      this.$store.commit("benefits/changeIsFilter", false);
      console.log("reset");
      this.categorie = "";
      this.$store.commit("benefits/store", []);

      this.$store.dispatch("benefits/fetchAll");
    },
  },
  watch: {
    visiblePages: function (value, prevValue) {
      this.allBenefits = this.myBenefits.slice(
        (this.page - 1) * this.perPage,
        this.page * this.perPage
      );
    },
    isFilter: function (newVal, oldVal) {
      console.log(newVal, "ici");
      if (newVal) {
        this.benefitsLength = this.$store.getters["benefits/all"].length;
        // console.log(this.benefitsLength);

        this.paginateLength = Math.ceil(this.benefitsLength / this.perPage);
        this.pages = Object.keys(
          Array.apply(0, Array(this.benefitsLength))
        ).map(Number);
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
