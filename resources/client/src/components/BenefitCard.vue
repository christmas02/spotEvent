<template>
    <base-card>
        <v-btn color="primary" class="discover-btn" small>Découvrir</v-btn>
    </base-card>
</template>

<script lang="ts">
import Vue from "vue";
import BaseCard from "./BaseCard.vue";

export default Vue.extend({
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
}
</style>
