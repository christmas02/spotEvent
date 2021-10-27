<template>
  <div class="vh-100 vw-100 my-row" id="auth-layout">
    <div class="col-md-6 left d-none d-md-block" :class="action">
      <div class="welcome">
        <div class="top">
          <img
            @click="goHome"
            src="../assets/logo.png"
            alt="logo"
            class="logo"
          />
          <div>
            <img src="../assets/icons/lfb.png" alt="facebook" class="icon" />
            <img src="../assets/icons/inst.png" alt="instagram" class="icon" />
            <img src="../assets/icons/lytb.png" alt="youtube" class="icon" />
          </div>
        </div>
        <div class="d-flex flex-column align-items-center w-100">
          <h2 class="auth-title">{{ title }}</h2>
          <h3 class="auth-subtitle">{{ subtitle }}</h3>
          <div class="btn-container">
            <v-btn
              class="mr-2"
              color="primary"
              :to="{ name: 'auth-register' }"
              x-large
              :outlined="action === 'register'"
              >S'inscrire</v-btn
            >
            <v-btn
              color="primary"
              :to="{ name: 'auth-login' }"
              x-large
              :outlined="action === 'login'"
              >Se connecter</v-btn
            >
          </div>
        </div>
      </div>
    </div>
    <v-navigation-drawer v-model="drawer" app fixed temporary>
      <!-- :lazy-src="require('../assets/dark-logo.png')" -->
      <div class="d-flex justify-center my-3">
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
          <div
            class="d-flex justify-center"
            v-if="currentRouteName != 'auth-register'"
          >
            <v-btn color="primary" :to="{ name: 'auth-register' }" exact>
              Inscription
            </v-btn>
          </div>
          <div
            class="my-5 d-flex justify-center"
            v-if="currentRouteName != 'auth-login'"
          >
            <v-btn color="primary" outlined :to="{ name: 'auth-login' }" exact>
              Connexion
            </v-btn>
          </div>
        </div>
      </v-list>
    </v-navigation-drawer>
    <div class="col-md-6">
      <div class="form-container">
        <div class="d-flex justify-end" v-if="auth">
          <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>
        </div>

        <slot></slot>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  name: "auth",
  props: {
    title: {
      type: String,
      required: true,
    },
    subtitle: {
      type: String,
      required: true,
    },
    action: {
      type: String,
      required: true,
      validator(value: any): boolean {
        const accepted = ["login", "register"];
        return accepted.includes(value);
      },
    },
  },

  computed: {
    currentRouteName() {
      return this.$route.name;
    },
    auth(): boolean {
      return this.$store.getters["auth/isConnected"];
    },
  },

  methods: {
    // test() {
    //   console.log(this.$route.name);
    // },
    goHome() {
      // this.$router.push("/");
      this.$router.push({ name: "Home" });
    },
  },
  data() {
    return {
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
});
</script>

<style>
#auth-layout .login {
  background: url("../assets/images/bg-login.png");
}

#auth-layout .register {
  background: url("../assets/images/bg-register.png");
}

#auth-layout .welcome {
  color: #fff;
  position: relative;
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

#auth-layout .top {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: space-between;
  width: 100%;
}

#auth-layout .left {
  padding: 2% 3%;
}

#auth-layout .icon {
  cursor: pointer;
  margin-left: 10px;
  height: 50px;
  width: 50px;
}

#auth-layout .page-title {
  font-size: 3rem;
  font-weight: 300;
  margin: 0;
  padding: 0;
}

#auth-layout .page-title::after {
  content: "";
  display: block;
  width: 100px;
  height: 5px;
  background: var(--primary);
}

@media screen and (max-width: 1024px) {
  #auth-layout .auth-title {
    font-size: 4rem !important;
    margin-bottom: -35px;
  }
  .btn-container {
    width: 100% !important;
    justify-content: center !important;
  }
  #auth-layout .form-container {
    margin: 4% 4% !important;
  }
}
#auth-layout .auth-title {
  font-size: 6rem;
  margin-bottom: -35px;
}

#auth-layout .auth-subtitle {
  font-weight: 200;
  font-size: 1.9rem;
  margin-top: 15px;
}

#auth-layout button {
  font-size: 1.2rem !important;
}
#auth-layout .btn-container {
  width: 42%;
  display: flex;
  justify-content: space-between;
  margin-top: 50px;
}

#auth-layout .form-container {
  margin: 4% 10%;
  height: 90%;
}

#auth-layout .logo {
  height: 75px;
}
</style>
