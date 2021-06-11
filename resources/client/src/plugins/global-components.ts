import Vue from "vue";
import AuthLayout from "@/layouts/auth.vue";
import DefaultLayout from "@/layouts/default.vue";
import Navbar from "@/components/global/Navbar.vue";
import Footer from "@/components/global/Footer.vue";
import AuthButton from "@/components/global/AuthButton.vue";
import Jumbotron from "@/components/global/Jumbotron.vue";
import LoadingButton from "@/components/global/LoadingButton.vue";

Vue.component("auth-layout", AuthLayout);
Vue.component("default-layout", DefaultLayout);
Vue.component("nav-bar", Navbar);
Vue.component("app-footer", Footer);
Vue.component("auth-btn", AuthButton);
Vue.component("loading-btn", LoadingButton);
Vue.component("jumbotron", Jumbotron);
