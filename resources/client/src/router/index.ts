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

const guarded_routes: string[] = [];

const guest_routes: string[] = ["auth-login", "auth-register"];

const AUTH_KEY = "auth";

router.beforeEach((to, from, next) => {
    const routeName = to.name as string;
    ///if not connected and want to access routes guarded
    if(guarded_routes.includes(routeName) && !localStorage.getItem(AUTH_KEY)){
        next({name: 'auth-login'});
    }
    //else if connected and want to access to guest routes
    else if(localStorage.getItem(AUTH_KEY) && guest_routes.includes(routeName)){
        next({name: 'Home'});
    }
    //else good
    else next();

});

export default router;
