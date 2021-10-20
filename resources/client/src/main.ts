import "./bootstrap";
import "./registerServiceWorker";
import "./plugins/global-components";

import "bootstrap/dist/css/bootstrap-grid.min.css";

import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import vuetify from "@/plugins/vuetify";
// import "@/plugins/chatBot";
import "@/plugins/vue-sweetalert2";
import "@/plugins/vue-social-sharing";

import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

Vue.use(Loading);

Vue.component("loading", Loading);

Vue.config.productionTip = false;

new Vue({
    router,
    store,
    vuetify,
    render: h => h(App)
}).$mount("#app");
