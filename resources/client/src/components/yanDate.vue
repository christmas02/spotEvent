<template>
  <div>
    <v-date-picker
      readonly
      multiple
      :show-current="false"
      v-model="test"
      class="mt-4"
      locale="fr"
      full-width
      header-color="primary"
      color="red"
      :picker-date.sync="pickerDate"
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
      pickerDate: null,
      // date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
      //   .toISOString()
      //   .substr(0, 10),
      test: ["2021-10-22", "2021-10-23"],
    };
  },
});
</script>

<style>
</style>