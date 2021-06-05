<template>
  <div id="devis">
    <div class="row">
      <div class="col-md-3">
        <v-select
          label="Catégories"
          :items="categories"
          item-text="name"
          item-value="id"
        ></v-select>
      </div>
      <div class="col-md-3">
        <v-text-field label="Situation géographique"></v-text-field>
      </div>
      <div class="col-md-auto d-block d-md-flex align-items-md-center second">
        <v-select
          label="Estimation minimale"
          :items="estimatess"
          item-text="libelle"
          item-value="id"
        ></v-select>
        <v-select
          label="Estimation maximale"
          :items="estimatess"
          item-text="libelle"
          item-value="id"
        ></v-select>
        <v-btn color="primary" class="ml-md-5 submit-btn">
          <v-icon>mdi-magnify</v-icon>
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
#devis {
  background: var(--secondary);
  padding: 5% 2.5%;
  border-radius: 0;
}

#devis .submit-btn {
  width: 100%;
}

/* #devis .second {
  display: block;
} */

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