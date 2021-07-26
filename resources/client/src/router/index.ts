import Vue from "vue";
import VueRouter, { RouteConfig } from "vue-router";
import HomeScreen from "@/views/home.vue";
import LoginScreen from "@/views/auth/login.vue";
import RegisterScreen from "@/views/auth/register.vue";
import BenefitScreen from "@/views/benefit.vue";
import ContactScreen from "@/views/contact.vue";
import AboutScreen from "@/views/about.vue";
import Search from "@/views/search.vue";
import SeeMore from "@/views/SeeMore.vue";
import Chat from "@/views/Chat.vue";
import resetPassword from "@/views/resetPassword.vue";
import listePrestataires from "@/views/listePrestataires.vue";
import MoreTest from "@/views/MoreTest.vue";

import store from "@/store";

Vue.use(VueRouter);

const routes: Array<RouteConfig> = [
    {
        path: "/",
        name: "Home",
        component: HomeScreen
    },
    {
        path: "/test",
        name: "MoreTest",
        component: MoreTest
    },
    {
        path: "/mot-de-passe-oublie",
        name: "reset",
        component: resetPassword
    },
    {
        path: "/prestataires",
        name: "listePrestataires",
        component: listePrestataires
    },
    {
        path: "/recherche",
        name: "Search",
        component: Search
    },
    {
        path: "/categories",
        name: "SeeMore",
        component: SeeMore
    },
    {
        path: "/chat",
        name: "Chat",
        component: Chat
    },
    {
        path: "/connexion",
        name: "auth-login",
        component: LoginScreen
    },
    {
        path: "/inscription",
        name: "auth-register",
        component: RegisterScreen
    },
    {
        path: "/prestations/:id",
        name: "benefit",
        component: BenefitScreen
    },
    {
        path: "/contact",
        name: "contact",
        component: ContactScreen
    },
    {
        path: "/a-propos-de-nous",
        name: "about",
        component: AboutScreen
    }
];

const router = new VueRouter({
    mode: "history",
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 };
    },
    base: process.env.BASE_URL,
    routes
});

const guarded_routes: string[] = [];

const guest_routes: string[] = ["auth-login", "auth-register"];

const isConnected = store.getters["auth/isConnected"];

router.beforeEach((to, from, next) => {
    const routeName = to.name as string;
    ///if not connected and want to access routes guarded
    if (guarded_routes.includes(routeName) && !isConnected) {
        next({ name: "auth-login" });
    }
    //else if connected and want to access to guest routes
    else if (isConnected && guest_routes.includes(routeName)) {
        next({ name: "Home" });
    }
    //else good
    else next();
});

export default router;
