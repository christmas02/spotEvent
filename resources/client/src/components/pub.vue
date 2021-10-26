<template>
  <div class="my-5">
    <div>
      <v-img :src="val" height="250" aspect-ratio="1"></v-img>
      <!-- <v-img :src="require(`${test}`)" height="250"></v-img> -->
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  data() {
    return {
      test: require("./../assets/images/jmbg2.png"),
    };
  },
  // mounted() {
  //   this.test = "./../assets/images/jmbg2.png";
  // },
  computed: {
    val() {
      return require(`${this.src}`);
    },
  },
  props: {
    src: {
      type: String,
      required: false,
      default: "./../assets/images/jmbg2.png",
    },
    height: {
      type: String,
      required: false,
      default: "250",
    },
  },
});
</script>

<style>
</style>