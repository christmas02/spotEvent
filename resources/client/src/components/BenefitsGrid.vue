<template>
    <div class="row">
        <div class="col-md-4" v-for="n in 6" :key="n">
            <benefit-card></benefit-card>
        </div>
    </div>
</template>

<script lang="ts">
    import Vue from "vue"
    import BenefitCard from "./BenefitCard.vue"

    export default Vue.extend({
        components: {
            BenefitCard
        }
    })
</script>

<style scoped>

</style>
