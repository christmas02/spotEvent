<template>
  <v-expansion-panels>
    <v-expansion-panel>
      <v-expansion-panel-header>
        RECHERCHE <v-icon>mdi-magnify </v-icon>
      </v-expansion-panel-header>

      <v-expansion-panel-content>
        <search-form :handler="initSearch"></search-form>
      </v-expansion-panel-content>
    </v-expansion-panel>
  </v-expansion-panels>
</template>
<script lang="ts">
import SearchForm from "@/components/forms/SearchForm.vue";
import Vue from "vue";
export default Vue.extend({
  components: {
    SearchForm,
  },
  methods: {
    initSearch(): void {
      this.$router.push({ name: "Search" });
    },
  },
});
</script>