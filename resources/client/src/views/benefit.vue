<template>
    <default-layout :padding="false">
        <div id="benefit-page">
            <div class="default-padding">
                <div>
                    <jumbotron :image="benefit.path_img">
                        <div class="d-md-flex justify-content-md-between align-items-md-center">
                            <div class="col-md-6 h-100 d-flex flex-column justify-content-between">
                               <div></div>
                                <div>
                                   <h1 class="content-title">{{ benefit.name }}</h1>
                                   <p class="content-subtitle my-5">
                                      {{ benefit.description }}
                                   </p>
                               </div>
                                <h2 class="primary--text">{{ benefit.prestation}}</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="d-md-flex justify-content-md-center">
                                    <v-carousel cycle hide-delimiters v-model="model" height="400" class="provider-pics">
                                        <v-carousel-item
                                            v-for="(color, i) in colors"
                                            :key="color"
                                        >
                                            <v-sheet
                                                :color="color"
                                                height="100%"
                                                tile
                                            >
                                                <v-row
                                                    class="fill-height"
                                                    align="center"
                                                    justify="center"
                                                >
                                                    <div class="display-3">
                                                        Slide {{ i + 1 }}
                                                    </div>
                                                </v-row>
                                            </v-sheet>
                                        </v-carousel-item>
                                    </v-carousel>
                                </div>
                            </div>
                        </div>
                        <div class="top">
                            <v-btn color="primary" text x-large to="/">
                                <v-icon>mdi-arrow-left</v-icon>
                                Retour
                            </v-btn>
                            <v-btn icon color="primary" x-large outlined rounded class="btn-icon" :disabled="benefit.favoris !== 1">
                                <v-icon>mdi-heart</v-icon>
                            </v-btn>
                        </div>
                    </jumbotron>
                </div>
                <div class="main mx-auto">
                    <div class="row">
                        <div class="col-md-7 left">
                            <div class="section">
                                <h2 class="section-title">Description</h2>
                                <p>{{ benefit.description }}</p>
                            </div>
                            <div class="section">
                                <h2 class="section-title">Spécialités</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consequuntur nam nostrum quidem,
                                    recusandae reiciendis sapiente unde. A asperiores delectus eius facilis nam nemo, nisi nostrum,
                                    quas quasi, sit ut!
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consequuntur nam nostrum quidem,
                                    recusandae reiciendis sapiente unde. A asperiores delectus eius facilis nam nemo, nisi nostrum,
                                    quas quasi, sit ut!
                                </p>
                            </div>
                        </div>
                        <div class="offset-md-1 col-md-4">
                            <div class="section">
                                <h2 class="section-title">Localisation</h2>
                                <h3 class="location-title">{{ benefit.localisation}}</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est hic minus molestias natus necessitatibus porro quidem veritatis voluptas. Aperiam commodi consequuntur</p>
                            </div>
                            <div class="section">
                                <h2 class="section-title">Contacts</h2>
                                <p>
                                    Entrez en contact avec le prestataire.
                                </p>
                                <div>
                                    <v-btn icon color="primary" x-large>
                                        <v-icon>mdi-phone</v-icon>
                                    </v-btn>
                                    <v-btn icon color="primary" x-large :disabled="benefit.messagerie !== 1">
                                        <v-icon>mdi-message-processing</v-icon>
                                    </v-btn>
                                    <v-btn icon color="primary" x-large>
                                        <v-icon>mdi-email</v-icon>
                                    </v-btn>
                                </div>
                            </div>
                            <div class="section">
                                <h2 class="section-title">Reseaux sociaux</h2>
                                <p>
                                    Rejoignez-nous sur les réseaux sociaux
                                </p>
                                <div>
                                    <v-btn icon color="primary" x-large tag="a" :href="benefit.lien_facebook" target="_blank">
                                        <v-icon>mdi-facebook</v-icon>
                                    </v-btn>
                                    <v-btn icon color="primary" x-large tag="a" :href="benefit.lien_instagram" target="_blank">
                                        <v-icon>mdi-instagram</v-icon>
                                    </v-btn>
                                    <v-btn icon color="primary" x-large>
                                        <v-icon>mdi-youtube</v-icon>
                                    </v-btn>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
            <div class="other-benefits">
                <div class="default-padding">
                    <h2 class="section-title">Autres prestations</h2>
                    <benefits-grid :benefits="others"></benefits-grid>
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

export default Vue.extend({
    name: "Benefit",
    data() {
        return {
            model: 0,
            colors: [
                'primary',
                'secondary',
                'yellow darken-2',
                'red',
                'orange',
            ],
        }
    },
    async beforeMount() {
        await this.$store.dispatch("benefits/fetchAll");
    },
    components: {
        Jumbotron,
        BenefitsGrid,
        ProvidersSlider
    },
    computed: {
        benefit(): Benefit {
            return this.$store.getters["benefits/one"](this.$route.params.id);
        },
        others(): Benefit[] {
            return this.$store.getters["benefits/others"](this.$route.params.id);
        },
    },
});
</script>

<style scoped>

    .section {
        margin-bottom: 40px;
    }

    .provider-pics {
        width: 70%;
    }

    .location-title {
        font-size: 1.4rem;
        margin-bottom: 10px;
    }


    #benefit-page .main {
        padding: 60px 0;
    }

    .section-title {
        margin-bottom: 30px;
    }

    .top {
        padding: 0 4%;
        display: flex;
        position: absolute;
        top: 20px;
        left: 0;
        width: 100%;
        justify-content: space-between;
    }

    .other-benefits {
        padding: 70px 0;
        background-color: #f4f5f7;
    }
</style>
