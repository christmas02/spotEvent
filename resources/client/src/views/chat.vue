<template>
  <default-layout :padding="padding">
    <v-toolbar dark color="primary">
      <!-- <v-btn icon dark @click="closeDialog">
        <v-icon>mdi-close</v-icon>
      </v-btn> -->
      <v-toolbar-title>
        <div class="d-flex">
          <img
             style="width: 60px; margin-right: 5px;"
              :src="require('@/assets/light-logo.png')"
            ></img>
          <h3>Mon Chat</h3>
        </div>
      </v-toolbar-title>
      <v-spacer></v-spacer>
    </v-toolbar>
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
  methods: {
    closeDialog() {
      console.log("clickkk");
    },
  },
});
</script>

<style>
</style>