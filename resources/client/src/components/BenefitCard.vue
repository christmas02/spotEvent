<template>
    <v-card
        class="mx-auto"
        max-width="344"
    >
        <v-img
            src="https://cdn.vuetifyjs.com/images/cards/sunshine.jpg"
            height="250px"
        >
            <v-btn color="primary" class="discover-btn" small>Découvrir</v-btn>
        </v-img>

        <v-card-title class="the-title">
            Top western road trips
        </v-card-title>

        <v-card-subtitle class="subtitle">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Adipisci cum dolorem voluptatum.
             </v-card-subtitle>
    </v-card>
</template>

<script>
    export default {
    }
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

    .discover-btn {
        position: absolute;
        top: 8%;
        left: 6%;
    }
</style>
