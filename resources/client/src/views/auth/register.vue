<template>
    <auth-layout title="Bienvenue !" subtitle="Plateforme de mise en relation  dans le secteur évènementiel." action="register">
        <register-form></register-form>
    </auth-layout>
</template>

<script lang="ts">
    import  Vue from 'vue'
    import RegisterForm from "@/components/forms/RegisterForm.vue"

    export default Vue.extend({
        name: "register",
        components: {
            RegisterForm
        }
    })
</script>

<style scoped>

</style>
