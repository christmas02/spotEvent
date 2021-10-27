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
        <div class="d-flex justify-center my-3" v-if="!auth">
          <v-img
            :src="require('../assets/dark-logo.png')"
            contain
            height="60"
            width="120"
          >
          </v-img>
        </div>

        <div v-if="auth">
          <v-img
            lazy-src="https://picsum.photos/id/11/10/6"
            :src="defaultUrl + pathUser"
            height="100px"
            dark
          >
          </v-img>
        </div>

        <v-list dense v-model="group" active-class="primary">
          <template>
            <div>
              <v-list-group no-action group @click.stop v-if="auth">
                <template v-slot:activator>
                  <v-list-item-title>{{ user.name }}</v-list-item-title>
                </template>

                <v-list-item link @click="activeWorkerSpaceModal">
                  <v-list-item-title>Mon espace</v-list-item-title>
                </v-list-item>
                <v-list-item link @click="activeFavoriteModal">
                  <v-list-item-title>Mes Favoris</v-list-item-title>
                </v-list-item>
                <v-list-item link @click="chat">
                  <v-list-item-title>Mes messages</v-list-item-title>
                </v-list-item>

                <v-list-item link @click="logout" class="mb-3">
                  <v-list-item-title>Deconnexion</v-list-item-title>
                </v-list-item>
              </v-list-group>
            </div>
          </template>

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
      </v-navigation-drawer>
      <v-main app>
        <div style="margin-top: 30px">
          <template>
            <div>
              <worker-space-modal
                v-model="statusWorkerDialog"
              ></worker-space-modal>
              <favorite-modal v-model="statusFavoriteDialog"></favorite-modal>
            </div>
          </template>
          <slot></slot>
        </div>
      </v-main>
    </div>
    <app-footer app></app-footer>
  </div>
</template>

<script lang="ts">
import { IUser } from "@/interfaces/auth.interfaces";
import favoriteModal from "@/components/global/favoriteModal.vue";
import WorkerSpaceModal from "@/components/global/WorkerSpaceModal.vue";
export default {
  name: "default",
  components: { favoriteModal, WorkerSpaceModal },
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
      statusWorkerDialog: false,
      statusFavoriteDialog: false,
      navBarHeight: "90",
      scroll: 0,
      drawer: false,
      defaultUrl: `${window.location.origin}/spotevent/public/storage/`,
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
    pathUser: function () {
      return this.$store.getters["auth/user"].path_user;
    },
    user(): IUser {
      return this.$store.getters["auth/user"];
    },
  },
  methods: {
    onScroll() {
      this.scroll = window.scrollY;
    },
    actionDrawer() {
      console.log("riffle");
      this.$emit("change", true);
    },
    goHome() {
      // this.$router.push("/");
      this.$router.push({ name: "Home" });
    },
    logout() {
      // window.location.href = "/";
      this.$store.commit("auth/logout");
      this.$router.push({ name: "auth-login" });
      console.log("bingo");
      if (this.$route.name != "Home") {
        // this.$router.push("/");
      }
    },
    chat() {
      this.$store.commit("auth/updateIdBenefitToChat", null);
      this.$router.push({ name: "Chat" });
    },
    activeFavoriteModal() {
      this.statusFavoriteDialog = true;
      // this.$store.commit("auth/authFavoritesModalStatus", true);
    },
    activeWorkerSpaceModal() {
      console.log("ouvert");
      this.statusWorkerDialog = true;
      // this.$store.commit("auth/authWorkerSpaceModalStatus", true);
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

@media screen and (max-width: 768px) {
  .mybar {
    margin-right: 10px !important;
    margin-left: 10px !important;
  }
}
</style>
