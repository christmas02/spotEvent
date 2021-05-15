<template>
    <v-card class="mx-auto" :max-width="maxWidth" :min-width="minWidth">
        <v-img
            src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            height="250px"
        >
            <slot></slot>
        </v-img>

        <v-card-title class="the-title">
            Top western road trips
        </v-card-title>

        <v-card-subtitle class="subtitle">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci
            cum dolorem voluptatum.
        </v-card-subtitle>
    </v-card>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
    props: {
        maxWidth: {
            type: String,
            default: "344"
        },
        minWidth: {
            type: String,
            default: "auto"
        }
    }
});
</script>

<style scoped>
.the-title {
    font-size: 1.4rem !important;
    color: var(--primary);
}

.subtitle {
    color: #000 !important;
    font-weight: 600;
    font-size: 0.9em;
}
</style>
