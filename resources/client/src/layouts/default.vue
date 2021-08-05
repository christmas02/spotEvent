<template>
  <div>
    <!-- :style="{ marginTop: '112px' }" -->
    <div :class="{ 'default-padding': padding }">
      <nav-bar
        :height="navBarHeight"
        class="mybar"
        :isFixed="scroll > 10"
      ></nav-bar>
      <v-main app>
        <div style="margin-top: 30px">
          <slot></slot>
        </div>
      </v-main>
    </div>
    <app-footer app></app-footer>
  </div>
</template>

<script >
export default {
  name: "default",
  props: {
    padding: {
      type: Boolean,
      default: true,
    },
  },
  mounted() {
    if (window) window.addEventListener("scroll", this.onScroll);
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.onScroll);
  },
  data() {
    return {
      navBarHeight: "90",
      scroll: 0,
    };
  },
  methods: {
    onScroll() {
      this.scroll = window.scrollY;
    },
  },
};
</script>
<style>
.mybar * {
  z-index: 100;
}

.mybar {
  display: inline;
}
</style>
