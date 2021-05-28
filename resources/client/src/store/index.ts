import Vue from "vue";
import Vuex from "vuex";
import benefitsModule from "./modules/benefits";
import authModule from "./modules/auth";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        benefits: benefitsModule,
        auth: authModule
    },
    plugins: [
        createPersistedState({
            paths: ["auth"]
        })
    ]
});
