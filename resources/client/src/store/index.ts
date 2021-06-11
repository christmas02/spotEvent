import Vue from "vue";
import Vuex from "vuex";
import benefitsModule from "./modules/benefits";
import authModule from "./modules/auth";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        contactModal: false,
        loading: false
    },
    mutations: {
        contactModal(state: any, status: boolean) {
            state.contactModal = status;
        },
        startLoading(state: any) {
            state.loading = true;
        },
        stopLoading(state: any) {
            state.loading = false;
        }
    },
    getters: {
        contactModal(state: any) {
            return state.contactModal;
        }
    },
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
