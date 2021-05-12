import Vue from "vue"
import AuthLayout from "@/layouts/auth.vue"
import DefaultLayout from "@/layouts/default.vue"
import Navbar from "@/components/global/Navbar.vue"
import Footer from "@/components/global/Footer.vue"

Vue.component("auth-layout", AuthLayout);
Vue.component("default-layout", DefaultLayout);
Vue.component("nav-bar", Navbar);
Vue.component("app-footer", Footer);
