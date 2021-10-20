<template>
  <v-app app>
    <login-modal></login-modal>
    <!-- <loading
      :active="!SocketConnected"
      :opacity="0.8"
      loader="bars"
      :can-cancel="false"
      :is-full-page="true"
    ></loading> -->
    <router-view />
  </v-app>
</template>


<script lang="ts">
import Vue from "vue";
import loginModal from "./components/global/loginModal.vue";

export default Vue.extend({
  components: {
    loginModal,
    // , favoriteModal, WorkerSpaceModal
  },
  data() {
    return {
      SocketConnected: false,
    };
  },
  async beforeMount() {
    this.$store.commit("auth/authFavoritesModalStatus", false);
    this.$store.commit("auth/authWorkerSpaceModalStatus", false);
    try {
      await this.$store.dispatch("fetchContentTexts");
    } catch (error) {
      console.log(error);
    }
    this.SocketConnected = true;
  },
});
</script>
<style>
:root {
  --primary: #fbb231;
  --secondary: #2f374a;
  --default-padding: 5%;
}
.share {
  text-decoration: none !important;
}
.v-card {
  overflow: hidden !important;
}

.main {
  width: 90%;
  margin-left: auto;
  margin-right: auto;
}

.text-primary {
  color: var(--primary) !important;
}

.nav-list .v-list-item--active {
  background: transparent !important;
  color: var(--primary) !important;
}

.default-padding {
  padding-left: var(--default-padding);
  padding-right: var(--default-padding);
}
.my-jumbotron .content-title {
  font-size: 4.5rem;
  line-height: 0.9em;
}

.my-jumbotron .content-subtitle {
  font-size: 1.2rem;
}
.vh-100 {
  height: 100vh;
}

.vw-100 {
  width: 100vw;
}

.h-100 {
  height: 100%;
}

.w-100 {
  width: 100%;
}

.my-row {
  --bs-gutter-x: 1.5rem;
  --bs-gutter-y: 0;
  display: flex;
  flex-wrap: wrap;
  margin: calc(var(--bs-gutter-y) * -1) calc(var(--bs-gutter-x) / -2) 0 !important;
}

#benefit-page .my-jumbotron {
  overflow: hidden;
}
#benefit-page .my-jumbotron .content {
  background: rgba(0, 0, 0, 0.4);
}

button {
  text-transform: none !important;
}
button.primary {
  color: #000 !important;
}

button.v-btn--outlined.primary--text .v-btn__content {
  color: #fff !important;
}

.v-input--is-label-active .v-label--active {
  font-weight: bold;
  color: #000 !important;
}

.section-title {
  font-size: 2.3rem;
}

.section-title::after {
  content: "";
  display: block;
  width: 90px;
  height: 5px;
  background: var(--primary);
}

.v-btn.v-btn--icon.primary--text {
  color: #000 !important;
  background: var(--primary);
}

.v-btn.v-btn--icon.primary--text.v-btn--outlined {
  color: #fff !important;
}

/*.v-btn--outlined.v-btn--round.v-btn--rounded.primary--text {*/
/*    background: #fbb231;*/
/*}*/

#devis .theme--light.v-select .v-select__selection {
  color: #fff !important;
}
</style>
