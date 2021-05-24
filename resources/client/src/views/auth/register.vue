<template>
    <auth-layout title="Bienvenue !" subtitle="Plateforme de mise en relation  dans le secteur évènementiel." action="register">
        <v-tabs
            v-model="tab"
            background-color="transparent"
            grow
        >
            <v-tab>Je recherche une prestation</v-tab>
            <v-tab>Je suis un prestataire</v-tab>
        </v-tabs>

        <v-tabs-items v-model="tab">
            <v-tab-item
            >
                <register-form role="1"></register-form>
            </v-tab-item>
            <v-tab-item
            >
                <register-form role="2"></register-form>
            </v-tab-item>
        </v-tabs-items>
    </auth-layout>
</template>

<script lang="ts">
    import  Vue from 'vue'
    import RegisterForm from "@/components/forms/RegisterForm.vue"

    export default Vue.extend({
        name: "register",
        components: {
            RegisterForm
        },
        data() {
            return {
                tab: null,
            }
        },
    })
</script>

<style scoped>

</style>
