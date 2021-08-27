<template>
  <div id="devis">
    <div class="row">
      <div class="col-md-3">
        <v-select
          v-model="choiceCategorie"
          label="Prestations"
          :items="categories"
          item-text="name"
          item-value="id"
        ></v-select>
      </div>
      <div class="col-md-3">
        <v-select
          v-model="choiceLocalisation"
          label="Situation géographique"
          :items="communes"
          item-text="name"
          item-value="id"
        ></v-select>
      </div>
      <div class="col-md-6 d-block d-md-flex align-items-md-center second">
        <v-select
          v-model="choiceEstimateMin"
          label="Estimation minimale"
          :items="estimatess"
          item-text="libelle"
          item-value="libelle"
        ></v-select>
        <v-select
          v-model="choiceEstimateMax"
          label="Estimation maximale"
          :items="estimatess"
          item-text="libelle"
          item-value="libelle"
        ></v-select>
        <v-btn color="primary" class="ml-md-5 submit-btn">
          <v-icon @click="handler">mdi-magnify</v-icon>
        </v-btn>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import { Benefit } from "@/interfaces/benefit.interface";
import { ICategory } from "@/interfaces/category.interface";
import { IEstimate } from "@/interfaces/estimation.interface";
import { IProvider } from "@/interfaces/provider.interface";

export default Vue.extend({
  props: {
    handler: {
      type: Function,
      required: true,
    },
  },
  computed: {
    benefits(): Benefit[] {
      return this.$store.getters["benefits/all"];
    },
    categories(): ICategory[] {
      return this.$store.getters["benefits/categories"];
    },
    communes(): ICategory[] {
      return this.$store.getters["benefits/communes"];
    },
    estimatess(): IEstimate[] {
      return this.$store.getters["benefits/estimates"];
    },
    providers(): IProvider[] {
      return this.$store.getters["benefits/providers"];
    },
    choiceCategorie: {
      get(): string {
        return this.$store.getters["benefits/choiceCategorie"];
      },
      set(value: string): void {
        this.$store.commit("benefits/updateChoiceCategorie", value);
      },
    },
    choiceLocalisation: {
      get(): string {
        return this.$store.getters["benefits/choiceLocalisation"];
      },
      set(value: string): void {
        this.$store.commit("benefits/updateChoiceLocalisation", value);
      },
    },
    choiceEstimateMax: {
      get(): string {
        return this.$store.getters["benefits/choiceEstimateMax"];
      },
      set(value: string): void {
        this.$store.commit("benefits/updateChoiceEstimateMax", value);
      },
    },
    choiceEstimateMin: {
      get(): string {
        return this.$store.getters["benefits/choiceEstimateMin"];
      },
      set(value: string): void {
        this.$store.commit("benefits/updateChoiceEstimateMin", value);
      },
    },
  },
});
</script>

<style>
#devis {
  background: var(--secondary);
  padding: 5% 2.5%;
  border-radius: 0;
}

#devis .submit-btn {
  width: 100%;
}

@media screen and (min-width: 1264px) {
  #devis {
    width: 90%;
    padding: 10px 15px 10px 40px;
  }

  #devis .submit-btn {
    width: auto;
  }
}

#devis .v-label,
#devis .v-input input {
  color: #fff;
}

#devis .v-text-field > .v-input__control > .v-input__slot:after,
#devis .v-text-field > .v-input__control > .v-input__slot:before {
  background-color: #fff !important;
}

#devis .v-text-field:hover > .v-input__control > .v-input__slot:after,
#devis .v-text-field:hover > .v-input__control > .v-input__slot:before {
  background-color: #fff !important;
}
</style>