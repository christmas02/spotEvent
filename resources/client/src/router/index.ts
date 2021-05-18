import Vue from "vue";
import VueRouter, { RouteConfig } from "vue-router";
import HomeScreen from "@/views/home.vue";
import LoginScreen from "@/views/auth/login.vue";
import RegisterScreen from "@/views/auth/register.vue";
import BenefitScreen from "@/views/benefit.vue";
import ContactScreen from "@/views/contact.vue";

Vue.use(VueRouter);

const routes: Array<RouteConfig> = [
    {
        path: "/",
        name: "Home",
        component: HomeScreen
    },
    {
        path: "/login",
        name: "auth-login",
        component: LoginScreen
    },
    {
        path: "/register",
        name: "auth-register",
        component: RegisterScreen
    },
    {
        path: "/benefit/:id",
        name: "benefit",
        component: BenefitScreen
    },
    {
        path: "/contact",
        name: "contact",
        component: ContactScreen
    }
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});

export default router;
