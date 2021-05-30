<template>
  <v-card
    class="my-jumbotron"
    :style="{ backgroundImage: 'url(' + image + ')' }"
  >
    <!-- <img :src="image" alt="" class="background" /> -->
    <div class="content">
      <slot></slot>
    </div>
    <slot name="append"></slot>
  </v-card>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  props: {
    image: {
      type: String,
      required: false,
      default: "https://picsum.photos/id/11/10/6",
    },
  },
});
</script>

<style scoped>
.my-jumbotron {
  position: relative;
  height: 600px;
  box-shadow: none !important;
  border-radius: 50px !important;
  background-position: center;
  background-size: cover;
}

.content {
  position: absolute;
  display: flex;
  flex-direction: column;
  justify-content: center;
  top: 0;
  left: 0;
  padding: 0 4%;
  color: #fff;
  height: 100%;
  width: 100%;
}

.background {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  border-radius: 40px;
}
</style>
