<template>
  <div>
    <v-expansion-panels>
      <v-expansion-panel>
        <v-expansion-panel-header expand-icon="mdi-filter">
          FILTRES
        </v-expansion-panel-header>

        <v-expansion-panel-content>
          <new-filter></new-filter>
        </v-expansion-panel-content>
      </v-expansion-panel>
    </v-expansion-panels>
  </div>
</template>
<script lang="ts">
import NewFilter from "@/components/forms/NewFilter.vue";
import Vue from "vue";
export default Vue.extend({
  components: {
    NewFilter,
  },
});
</script>