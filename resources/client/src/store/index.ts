import Vue from "vue";
import Vuex from "vuex";
import benefitsModule from "./modules/benefits";
import authModule from "./modules/auth";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        contactModal: false,
        loading: false,
        favoritesModal: false
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
        },
        authFavoritesModalStatus(state: any, val: boolean) {
            state.favoritesModal = val;
        }
    },
    getters: {
        contactModal(state: any) {
            return state.contactModal;
        },
        favoritesModal(state: any): boolean {
            return state.favoritesModal;
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
