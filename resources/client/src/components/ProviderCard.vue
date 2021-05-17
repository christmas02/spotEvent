<template>
    <base-card>
        <div class=" d-flex justify-content-between align-items-center img-content">
           <div>
                <v-btn color="primary" class="discover-btn" small
                >Demander un devis</v-btn>
           </div>
            <div class="btn-container">
                <v-btn icon color="primary" outlined><v-icon>mdi-star</v-icon></v-btn>
                <v-btn icon color="primary" outlinedc><v-icon>mdi-phone</v-icon></v-btn>
            </div>
        </div>
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
.img-content {
    margin: 4% 4%  0% 4%;
}
</style>
