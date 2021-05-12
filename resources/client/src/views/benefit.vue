<template>
    <default-layout>
        <div id="benefit-page">
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
                                    <v-text-field label="text"></v-text-field>
                                </div>
                                <div class="col-md-4">
                                    <v-text-field label="text"></v-text-field>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <v-text-field label="text"></v-text-field>
                                    <v-btn color="primary" class="ml-5">
                                        <v-icon>mdi-magnify</v-icon>
                                    </v-btn>
                                </div>
                            </div>
                        </div>
                    </template>
                </jumbotron>
            </div>
            <div class="main mx-auto"></div>
        </div>
    </default-layout>
</template>

<script lang="ts">
import Vue from "vue";
import Jumbotron from "@/components/Jumbotron.vue";
import BenefitsGrid from "@/components/BenefitsGrid.vue";
import ProvidersSlider from "@/components/ProvidersSlider.vue";
export default Vue.extend({
    name: "Home",
    components: {
        Jumbotron,
        BenefitsGrid,
        ProvidersSlider
    }
});
</script>

<style></style>
