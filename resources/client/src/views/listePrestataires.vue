<template>
  <default-layout>
    <div id="homepage">
      <div class="main mx-auto">
        <div class="section">
          <div class="my-5">
            <div>
              <v-img
                :src="require('../assets/images/jmbg2.png')"
                height="250"
              ></v-img>
            </div>
          </div>
          <div class="psearch mx-auto">
            <v-autocomplete
              v-model="model"
              :items="providers"
              item-text="name_entreprise"
              item-value="id_prestataire"
              outlined
              label="Je recherche un prestataire"
              append-icon="mdi-account-search-outline"
              :loading="isLoading"
              :search-input.sync="search"
            ></v-autocomplete>
          </div>
          <div style="margin: 50px 0">
            <div class="loading" v-if="isLoading">
              <v-progress-circular
                indeterminate
                color="amber"
              ></v-progress-circular>
            </div>
            <div v-else-if="providers.length >= 1">
              <prestataires-grid :prestataires="element"></prestataires-grid>
              <yan-paginate
                :data="providers"
                :perPage="perPage"
                @changePage="getNewData"
              ></yan-paginate>
            </div>
            <div class="nothing" v-else-if="providers.length == 0">
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
import YanPaginate from "@/components/YanPaginate.vue";
import PrestatairesGrid from "@/components/PrestatairesGrid.vue";
import { BenefitService } from "../services/benefit.service";
import { IAutocompleteProvidersResponse } from "../interfaces/provider.interface";
export default Vue.extend({
  name: "Home",
  components: {
    PrestatairesGrid,
    YanPaginate,
  },
  data() {
    return {
      categorie: null as unknown as string,
      perPage: 8, //4
      isPaginate: false,
      element: [],
      search: null as unknown as string,
      model: null as unknown as string,
      isLoading: false,
      providers: [],
      count: 0,
    };
  },
  async beforeMount(): Promise<void> {
    this.isLoading = true;
    this.$store.commit("benefits/resetSearchForm");
    // this.loading = true;
    await Promise.all([
      this.$store.dispatch("benefits/fetchAll"),
      //   this.$store.dispatch("benefits/fetchCommunes"),
      this.$store.dispatch("benefits/fetchProviders"),
    ]);

    this.providers = this.$store.getters["benefits/providers"];
    this.count = this.providers.length;

    this.isLoading = false;
  },
  methods: {
    getNewData(e: any) {
      console.log(e, "emit");
      this.element = e;
    },
  },
  watch: {
    async search(val: string) {
      // Items have already been loaded
      // if (this.benefits.length > 0) return;

      // Items have already been requested
      if (this.isLoading) return;

      this.isLoading = true;

      // Lazily load input items
      const service = new BenefitService();

      const result: IAutocompleteProvidersResponse =
        await service.autocompleteProviders(val);

      if (result.statu == 1) {
        this.providers = result.resultat;
        this.count = this.providers.length;
      }

      this.isLoading = false;
    },
  },
});
</script>

<style scoped>
#homepage .section {
  margin: 50px 0;
}
.psearch {
  width: 50%;
  /* margin-left: 10px; */
  /* border: 1px solid; */
}
#homepage .nothing {
  text-align: center;
  vertical-align: middle;
}

@media screen and (max-width: 768px) {
  .psearch {
    width: 70%;
    /* margin-left: 10px; */
    /* border: 1px solid; */
  }
}
@media screen and (min-width: 1264px) {
  #homepage .section {
    margin: 0px !important;
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
