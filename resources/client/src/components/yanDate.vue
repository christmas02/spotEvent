<template>
  <div>
    <v-date-picker
      :readonly="true"
      v-model="date"
      :events="allowedDates"
      class="mt-4"
      locale="fr"
      full-width
      event-color="green lighten-1"
      color="primary"
      elevation="10"
    ></v-date-picker>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  data() {
    return {
      allowedDates: null as unknown,
      date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),,
      test: ["2018-03-03", "2018-03-04"],
    };
  },
  mounted() {
    // this.allowedDates = [new Date("2021-11-20")];
    // this.allowedDates = [...Array(6)].map(() => {
    //   const day = Math.floor(Math.random() * 30);
    //   const d = new Date();
    //   d.setDate(day);
    //   console.log(d, d.toISOString().substr(0, 10));

    //   return d.toISOString().substr(0, 10);
    // });
    this.allowedDates = ["2021-10-21", "2021-10-22"];
  },
});
</script>

<style>
</style>