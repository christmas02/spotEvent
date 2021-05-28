<template>
    <base-card max-width="90%" :description="benefit.description" :title="benefit.name" :image="benefit.path_img">
        <v-btn
            color="primary"
            class="discover-btn"
            small
            :to="{ name: 'benefit', params: { id: benefit.id } }"
            >Découvrir</v-btn
        >
    </base-card>
</template>

<script lang="ts">
import { Benefit } from "@/interfaces/benefit.interface";
import Vue, { PropType } from "vue";
import BaseCard from "./BaseCard.vue";

export default Vue.extend({
    props: {
        benefit: {
            type: Object as PropType<Benefit>,
            required: true
        }
    },
    components: {
        BaseCard
    }
});
</script>

<style scoped>
.discover-btn {
    position: absolute;
    top: 8%;
    left: 6%;
    color: #000 !important;
}
</style>
