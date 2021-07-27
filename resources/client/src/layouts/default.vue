<template>
  <div>
    <div :class="{ 'default-padding': padding }">
      <nav-bar :height="navBarHeight" class="mybar"></nav-bar>
      <v-main :style="{ marginTop: '114px' }" class="bar">
        <slot></slot>
      </v-main>
    </div>
    <app-footer></app-footer>
  </div>
</template>

<script>
export default {
  name: "default",
  props: {
    padding: {
      type: Boolean,
      default: true,
    },
  },
  data() {
    return {
      navBarHeight: "90",
    };
  },
};
</script>
<style>
.mybar * {
  z-index: 100;
}
/* .bar {
  margin-top: 90px;
} */
@-moz-document url-prefix() {
  .bar {
    margin-top: 114px;
  }
}
@supports (-ms-ime-align: auto) {
  .bar {
    margin-top: 114px;
  }
}
</style>
