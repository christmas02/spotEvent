<template>
    <default-layout>
        <jumbotron :image="require('../assets/images/jmbg2.png')">
            <p>Pour plus d'infos</p>
            <h1 class="content-title">Contactez-nous</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Accusamus adipisci, animi doloribus eum fuga ipsam natus odio
                perferendis quibusdam quisquam rem sapiente totam vitae?
            </p>
        </jumbotron>

        <div class="main">
            <div class="row">
                <div class="col-md-4">
                    <v-list-item class="my-info">
                        <v-list-item-avatar color="primary">
                            <v-icon color="white">
                                mdi-folder
                            </v-icon>
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title class="title"
                                >Adresse</v-list-item-title
                            >

                            <v-list-item-subtitle class="subtitle">
                                <p class="m-0 p-0">Abidjan</p>
                                <p class="m-0 p-0">Abidjan</p>
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item class="my-info">
                        <v-list-item-avatar color="primary">
                            <v-icon color="white">
                                mdi-folder
                            </v-icon>
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title class="title"
                                >Adresse</v-list-item-title
                            >

                            <v-list-item-subtitle class="subtitle">
                                <p class="m-0 p-0">Abidjan</p>
                                <p class="m-0 p-0">Abidjan</p>
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>

                    <v-list-item class="my-info">
                        <v-list-item-avatar color="primary">
                            <v-icon color="white">
                                mdi-folder
                            </v-icon>
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title class="title"
                                >Adresse</v-list-item-title
                            >

                            <v-list-item-subtitle class="subtitle">
                                <p class="m-0 p-0">Abidjan</p>
                                <p class="m-0 p-0">Abidjan</p>
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>
                </div>
                <div class="col-md-8">
                    <div>
                        <h3>Envoyez-nous un message</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Aperiam dolores neque ratione voluptates.
                        </p>
                    </div>
                    <div>
                        <v-form>
                            <div class="row">
                                <div class="col-md-6">
                                    <v-text-field
                                        label="Nom"
                                        outlined
                                    ></v-text-field>
                                </div>
                                <div class="col-md-6">
                                    <v-text-field
                                        label="Prénoms"
                                        outlined
                                    ></v-text-field>
                                </div>
                                <div class="col-md-6">
                                    <v-text-field
                                        label="Email"
                                        outlined
                                    ></v-text-field>
                                </div>
                                <div class="col-md-6">
                                    <v-text-field
                                        label="Website"
                                        outlined
                                    ></v-text-field>
                                </div>
                                <div class="col-md-12">
                                    <v-textarea
                                        label="Message"
                                        outlined
                                    ></v-textarea>
                                </div>
                            </div>
                            <v-btn color="primary"
                                ><v-icon>mdi-arrow-right</v-icon></v-btn
                            >
                        </v-form>
                    </div>
                </div>
            </div>
        </div>
    </default-layout>
</template>

<script lang="ts">
import Vue from "vue";
import Jumbotron from "@/components/Jumbotron.vue";

export default Vue.extend({
    name: "Home",
    components: {
        Jumbotron
    }
});
</script>

<style scoped>
.main {
    padding-top: 80px;
    padding-bottom: 80px;
}
.my-info {
    background: #f9faff;
    margin-bottom: 30px;
    width: 90%;
}

.my-info .title {
    font-size: 25px;
}

.my-info .subtitle {
    font-size: 15px;
}
</style>
