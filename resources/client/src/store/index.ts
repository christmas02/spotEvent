import Vue from "vue";
import Vuex from "vuex";
import benefitsModule from "./modules/benefits";
import authModule from "./modules/auth";
import createPersistedState from "vuex-persistedstate";
import getters from './getters'
import mutations from './mutations'
import state from './state'
import actions from './actions'
Vue.use(Vuex);

export default new Vuex.Store({
    state,
    mutations,
    getters,
    actions,
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
