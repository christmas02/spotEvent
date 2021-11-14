<template>
  <div>
    <v-sheet height="64">
      <v-toolbar flat>
        <v-btn outlined class="mr-4" color="grey darken-2" @click="setToday">
          Aujourd'hui
        </v-btn>
        <v-btn
          fab
          text
          small
          color="grey darken-2"
          @click="$refs.calendar.prev()"
        >
          <v-icon small> mdi-chevron-left </v-icon>
        </v-btn>
        <v-btn
          fab
          text
          small
          color="grey darken-2"
          @click="$refs.calendar.next()"
        >
          <v-icon small> mdi-chevron-right </v-icon>
        </v-btn>
        <v-toolbar-title v-if="$refs.calendar">
          {{ $refs.calendar.title }}
        </v-toolbar-title>
        <v-spacer></v-spacer>
      </v-toolbar>
    </v-sheet>
    <v-sheet height="600">
      <v-calendar
        v-model="value"
        ref="calendar"
        :weekdays="weekday"
        type="month"
        :events="events"
        :event-overlap-threshold="30"
        event-color="red"
        lang="fr"
      ></v-calendar>
    </v-sheet>
  </div>
</template>
<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  props: {
    events: {
      type: Array,
      required: false,
    },
  },
  data() {
    return {
      weekday: [0, 1, 2, 3, 4, 5, 6],
      value: "",
      // events: [
      //   {
      //     name: "Indisponible",
      //     start: new Date(),
      //     end: new Date("2021-10-27"),
      //     color: "red",
      //   },
      //   {
      //     name: "Indisponible",
      //     start: new Date("2021-10-29"),
      //     end: new Date("2021-11-3"),
      //     color: "red",
      //   },
      // ],
    };
  },
  methods: {
    setToday() {
      this.value = "";
    },
  },
});
</script>
<style lang="">
</style>