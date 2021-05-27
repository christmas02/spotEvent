<template>
    <default-layout>
        <div id="homepage">
            <div>
                <jumbotron image="images/jmbg1.png">
                    <h1 class="content-title">Lorem ipsum<br />Dolor amet</h1>
                    <p class="content-subtitle my-5">
                        texte essai oui texte essai
                    </p>
                    <div>
                        <v-btn color="primary">Découvrir</v-btn>
                    </div>
                    <template #append>
                        <div id="devis">
                            <div class="row">
                                <div class="col-md-4">
                                    <v-select label="Catégories" :items="categories" item-text="name" item-value="id"></v-select>

                                </div>
                                <div class="col-md-4">
                                    <v-text-field label="Lieu"></v-text-field>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <v-select label="Estimation" :items="estimatess" item-text="libelle" item-value="id"></v-select>
                                    <v-btn color="primary" class="ml-5">
                                        <v-icon>mdi-magnify</v-icon>
                                    </v-btn>
                                </div>
                            </div>
                        </div>
                    </template>
                </jumbotron>
            </div>
            <div class="main mx-auto">
                <div class="section">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="section-title">Prestations</h2>
                        </div>
                        <div class="actions-container d-flex">
                            <div>
                                <v-btn color="primary" x-large>Toutes les prestations</v-btn>
                            </div>
                            <div class="mx-2">
                                <v-autocomplete label="Catégories" filled :items="categories" item-text="name" item-value="id"></v-autocomplete>
                            </div>
                            <div>
                                <v-autocomplete label="Estimations" filled :items="estimatess" item-text="libelle" item-value="id"></v-autocomplete>
                            </div>
                        </div>
                    </div>
                    <div style="margin: 50px 0">
                        <benefits-grid :benefits="benefits"></benefits-grid>
                    </div>
                    <div class="text-center">
                        <v-btn color="primary">Voir plus</v-btn>
                    </div>
                </div>
                <div class="section mt-0" v-if="false">
                    <div>
                        <h2 class="section-title">Prestataires</h2>
                    </div>
                    <div style="margin: 50px 0">
                        <providers-slider></providers-slider>
                    </div>
                    <div class="text-center">
                        <v-btn color="primary"
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
import Jumbotron from "@/components/Jumbotron.vue";
import BenefitsGrid from "@/components/BenefitsGrid.vue";
import ProvidersSlider from "@/components/ProvidersSlider.vue";
import { Benefit } from "@/interfaces/benefit.interface";
import {ICategory} from "@/interfaces/category.interface";
import {IEstimate} from "@/interfaces/estimation.interface";

export default Vue.extend({
    name: "Home",
    components: {
        Jumbotron,
        BenefitsGrid,
        ProvidersSlider
    },
    async beforeMount(): Promise<void> {
       await Promise.all(
           [this.$store.dispatch("benefits/fetchAll"),
                this.$store.dispatch("benefits/fetchCategories"),
                this.$store.dispatch("benefits/fetchEstimates")
           ]);
    },
    computed: {
        benefits(): Benefit[] {
            return this.$store.getters["benefits/all"];
        },
        categories(): ICategory[] {
            return this.$store.getters["benefits/categories"];
        },
        estimatess(): IEstimate[] {
            return this.$store.getters["benefits/estimates"];
        }
    },
});
</script>

<style>
#devis {
    position: absolute;
    bottom: -33px;
    background: var(--secondary);
    width: 90%;
    left: 5%;
    padding: 10px 15px 10px 40px;
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

#homepage .section {
    margin: 136px 0;
}

#homepage .actions-container button {
    margin-left: 10px;
}
</style>
