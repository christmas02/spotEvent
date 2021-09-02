<template>
  <div>
    <!-- :style="{ marginTop: '112px' }" -->
    <div :class="{ 'default-padding': padding }">
      <nav-bar
        :height="navBarHeight"
        class="mybar"
        v-model="drawer"
        :isFixed="scroll > 10"
      ></nav-bar>
      <v-navigation-drawer v-model="drawer" app fixed temporary>
        <!-- :lazy-src="require('../assets/dark-logo.png')" -->
        <div class="d-flex justify-center">
          <v-img
            :src="require('../assets/dark-logo.png')"
            contain
            height="60"
            width="120"
          >
          </v-img>
        </div>
        <v-list dense v-model="group" active-class="primary">
          <template v-for="link in links">
            <v-list-item
              :key="link.name"
              v-if="link.name != '#'"
              exact
              :to="{ name: link.name }"
            >
              <v-list-item-title>{{ link.label }}</v-list-item-title>
            </v-list-item>
            <v-list-item :key="link.label" v-else disabled>
              <v-list-item-title>{{ link.label }}</v-list-item-title>
            </v-list-item>
          </template>
          <div v-if="!auth" class="mt-8">
            <div class="d-flex justify-center">
              <v-btn color="primary" :to="{ name: 'auth-register' }" exact>
                Inscription
              </v-btn>
            </div>
            <div class="my-5 d-flex justify-center">
              <v-btn
                color="primary"
                outlined
                :to="{ name: 'auth-login' }"
                exact
              >
                Connexion
              </v-btn>
            </div>
          </div>
        </v-list>
        <!-- <template v-if="!auth">
          <div class="d-none d-md-block">
            <v-btn color="primary" outlined :to="{ name: 'auth-login' }" exact>
              Connexion
            </v-btn>

            <v-btn color="primary" :to="{ name: 'auth-register' }" exact>
              Inscription
            </v-btn>
          </div>
        </template> -->
        <!-- <v-list nav dense>
          <v-list-item-group v-model="group" active-class="primary">
            <v-list-item>
              <v-list-item-icon>
                <v-icon>mdi-home</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Home</v-list-item-title>
            </v-list-item>

            <v-list-item>
              <v-list-item-icon>
                <v-icon>mdi-account</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Account</v-list-item-title>
            </v-list-item>
          </v-list-item-group>
        </v-list> -->
      </v-navigation-drawer>
      <v-main app>
        <div style="margin-top: 30px">
          <slot></slot>
        </div>
      </v-main>
    </div>
    <app-footer app></app-footer>
  </div>
</template>

<script lang="ts">
export default {
  name: "default",
  props: {
    padding: {
      type: Boolean,
      default: true,
    },
  },
  mounted() {
    if (window) window.addEventListener("scroll", this.onScroll);
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.onScroll);
  },
  data() {
    return {
      navBarHeight: "90",
      scroll: 0,
      drawer: false,
      group: null,
      links: [
        {
          name: "Home",
          label: "Accueil",
        },
        {
          name: "about",
          label: "A propos de nous",
        },
        {
          name: "SeeMore",
          label: "Catégories",
        },
        {
          name: "listePrestataires",
          label: "Prestataires",
        },
        {
          name: "contact",
          label: "Contact",
        },
      ],
    };
  },
  computed: {
    auth(): boolean {
      return this.$store.getters["auth/isConnected"];
    },
  },
  methods: {
    onScroll() {
      this.scroll = window.scrollY;
    },
  },
  async beforeMount(): Promise<void> {
    this.$store.commit("benefits/resetSearchForm");
    // this.loading = true;
    this.$store.commit("benefits/changeLoading", true);
    this.$store.commit("benefits/changeIsFilter", false);
    await Promise.all([
      this.$store.dispatch("benefits/fetchAll"),
      this.$store.dispatch("benefits/fetchCategories"),
      this.$store.dispatch("benefits/fetchCommunes"),
      this.$store.dispatch("benefits/fetchEstimates"),
      this.$store.dispatch("benefits/fetchProviders"),
    ]);
  },
};
</script>
<style>
.mybar * {
  z-index: 100;
}

.mybar {
  display: inline;
}
</style>
