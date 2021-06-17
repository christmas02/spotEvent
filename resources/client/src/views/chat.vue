<template>
  <default-layout :padding="padding">
    <chat></chat>
  </default-layout>
  <!-- <div>
    <div :class="{ 'default-padding': padding }">
      <nav-bar :height="navBarHeight"></nav-bar>
      <v-main :style="{ marginTop: '105px' }">
        <chat></chat>
      </v-main>
    </div>
  </div> -->
</template>

<script lang="ts">
import Vue from "vue";
import chat from "@/components/chat";
export default Vue.extend({
  components: { chat },
  data() {
    return {
      padding: false,
      navBarHeight: "90",
    };
  },
});
</script>

<style>
</style>