<template>
  <div>
    <v-sheet height="64">
      <v-toolbar flat>
        <v-btn outlined class="mr-4" color="grey darken-2" @click="setToday">
          Aujourd'hui
        </v-btn>
        <v-btn fab text small color="grey darken-2" @click="next">
          <v-icon small> mdi-chevron-left </v-icon>
        </v-btn>
        <v-btn fab text small color="grey darken-2" @click="prev">
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
        :events="localEvents"
        :event-overlap-threshold="30"
        event-color="green"
        locale="fr"
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
      localEvents: [],
      weekday: [0, 1, 2, 3, 4, 5, 6],
      value: "",
    };
  },
  mounted() {
    console.log(this.$refs.calendar);
    // this.id += 1;
    this.formatEvent(0);
  },
  methods: {
    prev() {
      console.log("ici");
      this.$refs.calendar.next();
      this.formatEvent(1);
    },
    next() {
      console.log("ici");
      this.$refs.calendar.prev();
      this.formatEvent(-1);
    },
    formatEvent(val: number) {
      const listDatesCurrentMonth = this.getDateArray(
        this.$refs.calendar.lastStart.date,
        this.$refs.calendar.lastEnd.date,
        val
      );

      console.log(listDatesCurrentMonth, this.events);
      this.localEvents = listDatesCurrentMonth.map((elem: any, index) => {
        //date indispo
        if (this.events.includes(elem)) {
          return {
            name: "Indisponible",
            start: new Date(elem),
            end: new Date(elem),
            color: "red",
          };
        }
        return {
          name: "Disponible",
          start: new Date(elem),
          end: new Date(elem),
          color: "green",
        };
      });
    },
    getDateArray(start: string, end: string, orientation: number) {
      let arr = [];
      let dEnd = new Date(end);
      dEnd = new Date(dEnd.setMonth(dEnd.getMonth() + orientation));
      let dt = new Date(start);
      dt = new Date(dt.setMonth(dt.getMonth() + orientation));
      while (dt <= dEnd) {
        arr.push(new Date(dt).toISOString().slice(0, 10));
        dt.setDate(dt.getDate() + 1);
      }
      return arr;
    },
    setToday() {
      this.value = "";
    },
  },
});
</script>
<style lang="">
</style>