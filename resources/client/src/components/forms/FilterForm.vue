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
</template>

<script lang="ts">
import Vue, { PropType } from "vue";
import { Benefit } from "../../interfaces/benefit.interface";

export default Vue.extend({
  props: {
    benefits: {
      type: Object as PropType<Benefit[]>,
      required: true,
    },
  },
  data() {
    return {
      categorie: null as unknown as string,
      isFilter: false,
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
  },
  methods: {
    initSearch(): void {
      this.$router.push({ name: "Search" });
    },
    seeMore(): void {
      this.$router.push({ name: "SeeMore" });
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

        this.$store.commit("benefits/store", result.resultat);
      } else {
        console.log(result.resultat);
        this.$store.commit("benefits/store", result.resultat);
        this.loading = false;
      }
    },
    resetBenefits() {
      this.isFilter = false;
      this.categorie = "";
      this.$store.commit("benefits/store", []);

      this.$store.dispatch("benefits/fetchAll");
    },
  },
  watch: {
    categorie(newValue, oldValue) {
      // console.log(newValue);
      if (newValue) {
        this.getfilterByCategory();
      }
    },
  },
});
</script>

<style scoped>
</style>