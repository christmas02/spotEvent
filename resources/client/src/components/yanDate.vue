<template>
  <div>
    <v-date-picker
      v-model="date"
      :allowed-dates="allowedDates"
      class="mt-4"
      min="2016-06-15"
      max="2018-03-20"
      locale="fr"
      full-width
    ></v-date-picker>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  data() {
    return {
      date: "2018-03-02",
      test: ["2018-03-03", "2018-03-04"],
    };
  },
  methods: {
    allowedDates(val: any) {
      for (var i = 0; i < this.test.length; i++) {
        if (this.test[i] == val) {
          return val;
        }
      }
    },
  },
});
</script>

<style>
</style>