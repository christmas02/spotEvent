<template>
    <div id="default">
        <nav-bar></nav-bar>
        <v-main>
            <slot></slot>
        </v-main>

        <app-footer></app-footer>
    </div>
</template>

<script>
    export default {
        name: "default"
    }
</script>

<style scoped>
    #default {
        padding-left: 5%;
        padding-right: 5%;
    }
</style>
