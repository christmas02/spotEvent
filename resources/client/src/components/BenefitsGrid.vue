<template>
    <div class="row">
        <div class="col-md-4" v-for="benefit in benefits" :key="benefit.id">
            <benefit-card :benefit="benefit"></benefit-card>
        </div>
    </div>
</template>

<script lang="ts">
import { Benefit } from "@/interfaces/benefit.interface";
import Vue, { PropType } from "vue";
import BenefitCard from "./BenefitCard.vue";

export default Vue.extend({
    props: {
        benefits: {
            type: Array as PropType<Benefit[]>,
            required: true
        }
    },
    components: {
        BenefitCard
    }
});
</script>

<style scoped></style>
