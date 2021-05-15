<template>
    <v-form class="h-100 d-flex flex-column justify-content-between">
        <h1 class="page-title">Inscription</h1>

        <div>
            <v-text-field label="Nom"></v-text-field>
            <v-text-field label="Prénoms"></v-text-field>
            <v-select
                append-icon="mdi-chevron-down"
                :items="items"
                label="Catégorie"
            ></v-select>
            <v-text-field label="Email" type="email"></v-text-field>
            <v-text-field label="N° de téléphone" type="tel"></v-text-field>
            <v-text-field
                v-model="password"
                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show1 ? 'text' : 'password'"
                label="Choisir un mot de passe"
                @click:append="show1 = !show1"
            ></v-text-field>
        </div>
        <div>
            <v-btn color="primary"><v-icon>mdi-arrow-right</v-icon></v-btn>
        </div>
    </v-form>
</template>

<script lang="ts">
    import Vue from "vue"
    export default Vue.extend({
        name: "RegisterForm",
        data() {
            return {
                items: ['Foo', 'Bar', 'Fizz', 'Buzz'],
                password: "",
                show1: false
            }
        },
    })
</script>

<style scoped>

</style>
