<template>
    <v-form class="login-form">
        <h1 class="page-title">Connexion</h1>

        <div>
            <v-text-field label="Identifiant"></v-text-field>

            <v-text-field
                v-model="password"
                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show1 ? 'text' : 'password'"
                label="Choisir un mot de passe"
                @click:append="show1 = !show1"
            ></v-text-field>
        </div>
        <div>
            <v-btn color="primary">Connexion</v-btn>
        </div>
    </v-form>

</template>

<script lang="ts">
    import Vue from "vue"

    export default Vue.extend({
        name: "LoginForm",
        data() {
            return {
                password: "",
                show1: false
            }
        },
    })
</script>

<style scoped>
    .login-form {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 50%;
    }
</style>
