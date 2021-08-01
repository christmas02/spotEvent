<template>
  <!-- v-if="providers.length > perPage" -->
  <div v-if="data.length > perPage">
    <v-pagination
      class="py-5"
      v-model="page"
      :length="paginateLength"
      prev-icon="mdi-menu-left"
      next-icon="mdi-menu-right"
    ></v-pagination>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  props: {
    data: {
      type: Array,
      required: true,
      default: [],
    },
    perPage: {
      type: Number,
      required: false,
      default: 2,
    },
  },
  data() {
    return {
      allData: [],
      localData: [],
      page: 1,
      benefitsLength: 0,
      paginateLength: 0,
      pages: [] as number[],
      isPaginate: false,
    };
  },
  //   methods: {
  //     showElement() {
  //       this.$emit("changePage", this.allData);
  //     },
  //   },
  computed: {
    visiblePages(): number[] {
      return this.pages.slice(
        (this.page - 1) * this.perPage,
        this.page * this.perPage
      );
    },
  },
  watch: {
    visiblePages: function (value, prevValue) {
      this.allData = this.localData.slice(
        (this.page - 1) * this.perPage,
        this.page * this.perPage
      );
      console.log("watchaaa");
      this.$emit("changePage", this.allData);
    },
  },
  beforeMount() {
    // this.allData = this.data;
    //@ts-ignore
    this.localData = this.data;
    this.benefitsLength = this.data.length;
    // console.log(this.benefitsLength);
    this.paginateLength = Math.ceil(this.benefitsLength / this.perPage);
    this.pages = Object.keys(Array.apply(0, Array(this.benefitsLength))).map(
      Number
    );

    this.allData = this.localData.slice(
      (this.page - 1) * this.perPage,
      this.page * this.perPage
    );
    this.$emit("changePage", this.allData);
    console.log("banan");
  },
});
</script>

<style>
</style>