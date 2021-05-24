<template>
    <carousel-3d height="auto" space="250" autoplay controlsVisible perspective="0" animationSpeed="4000">
        <slide :index="0">
            <provider-card></provider-card>
        </slide>
        <slide :index="1">
            <provider-card></provider-card>
        </slide>
        <slide :index="2">
            <provider-card></provider-card>
        </slide>
        <slide :index="3">
            <provider-card></provider-card>
        </slide>
        <slide :index="4">
            <provider-card></provider-card>
        </slide>
    </carousel-3d>
</template>

<script lang="ts">
import Vue from "vue";
import { Carousel3d, Slide } from "vue-carousel-3d";
import ProviderCard from "@/components/ProviderCard.vue";

export default Vue.extend({
    components: {
        "carousel-3d": Carousel3d,
        Slide,
        ProviderCard
    }
});
</script>

<style>
.carousel-3d-slide.current {
    background: transparent !important;
    border: none;
}

.carousel-3d-slide {
    min-height: 400px;
    border-style: none;
    background-color: transparent;
}

.carousel-3d-slider {
    height: 400px;
}

.carousel-3d-controls .prev,
.carousel-3d-controls .next {
    background-color: var(--primary);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
