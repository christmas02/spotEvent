<template>
  <div class="vh-100 vw-100 my-row" id="auth-layout">
    <div class="col-md-7 left d-none d-md-block" :class="action">
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
            <img src="../assets/icons/ltwt.png" alt="twitter" class="icon" />
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
    <div class="col-md-5">
      <div class="form-container">
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
  methods: {
    goHome() {
      this.$router.push("/");
    },
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

#auth-layout .auth-title {
  font-size: 150px;
  margin-bottom: -35px;
}

#auth-layout .auth-subtitle {
  font-weight: 200;
  font-size: 1.9rem;
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
  margin: 4% 15%;
  height: 90%;
}

#auth-layout .logo {
  height: 75px;
}
</style>
