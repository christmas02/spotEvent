import Vue from 'vue'
import VueRouter, { RouteConfig } from 'vue-router'
import Home from '../views/Home.vue'
import LoginScreen from "@/views/auth/login.vue"
import RegisterScreen from "@/views/auth/register.vue"

Vue.use(VueRouter)

const routes: Array<RouteConfig> = [
  {
    path: '/',
    name: 'Home',
    component: Home
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
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
