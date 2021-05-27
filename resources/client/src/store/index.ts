import Vue from 'vue'
import Vuex from 'vuex'
import benefitsModule from "./modules/benefits";
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
      benefits: benefitsModule
  }
})
