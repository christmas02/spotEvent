<template>
  <v-card class="mx-auto">
    <div
      v-if="
        !statusFormUpdateProfil &&
        !statusFormUpdatePhoto &&
        !statusFormUpdatePassword
      "
    >
      <v-img
        lazy-src="https://picsum.photos/id/11/10/6"
        :src="user.path_user"
        height="340px"
        dark
      >
        <v-row class="fill-height">
          <v-card-title>
            <v-btn color="primary" icon @click="showPhoto">
              <v-icon>mdi-pencil</v-icon>
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn dark icon>
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
          </v-card-title>

          <v-spacer></v-spacer>

          <v-card-title class="white--text pl-12 pt-12">
            <div class="text-h4 pl-12 pt-12">{{ user.name }}</div>
          </v-card-title>
        </v-row>
      </v-img>

      <v-list two-line>
        <v-list-item>
          <v-list-item-icon>
            <v-icon color="indigo"> mdi-phone </v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>(+225) {{ user.phone }}</v-list-item-title>
            <v-list-item-subtitle>Mobile</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-divider inset></v-divider>
        <v-list-item>
          <v-list-item-icon>
            <v-icon color="indigo"> mdi-mail </v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ user.email }}</v-list-item-title>
            <v-list-item-subtitle>Email</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-divider inset></v-divider>
      </v-list>
      <div class="d-flex justify-content-center py-3">
        <v-btn depressed color="primary" @click="showProfil" class="mr-2">
          Modifier mon profil
        </v-btn>
        <v-btn depressed color="primary" @click="showPassword">
          Modifier mon mot de passe
        </v-btn>
      </div>
    </div>
    <div v-else-if="statusFormUpdateProfil" class="px-5 mt-0 py-2">
      <update-profil-form></update-profil-form>
    </div>
    <div v-else-if="statusFormUpdatePhoto" class="px-5 mt-0 py-2">
      <update-photo-form></update-photo-form>
    </div>
    <div v-else-if="statusFormUpdatePassword" class="px-5 mt-0 py-2">
      <update-password-form></update-password-form>
    </div>
  </v-card>
  <!-- <v-card v-else-if="statusFormUpdatePhoto">
    <p>un pot</p>
  </v-card> -->
</template>
<script lang="ts">
import Vue from "vue";
import UpdatePhotoForm from "@/components/forms/UpdatePhotoForm";
import UpdateProfilForm from "@/components/forms/UpdateProfilForm";
import UpdatePasswordForm from "@/components/forms/UpdatePasswordForm";
// import UpdatePhoto from
export default Vue.extend({
  components: { UpdatePhotoForm, UpdateProfilForm, UpdatePasswordForm },
  // data() {
  //   return {
  //     statusFormUpdateProfil: false,
  //     statusFormUpdatePhoto: false,
  //   };
  // },
  methods: {
    showProfil() {
      this.$store.commit("benefits/changeStatusFormUpdateProfil", true);
    },
    showPhoto() {
      this.$store.commit("benefits/changeStatusFormUpdatePhoto", true);
    },
    showPassword() {
      this.$store.commit("benefits/changeStatusFormUpdatePassword", true);
    },
  },
  computed: {
    user: function () {
      return this.$store.getters["auth/user"];
    },
    statusFormUpdateProfil: {
      get() {
        return this.$store.getters["benefits/statusFormUpdateProfil"];
      },
      set(val: boolean) {
        this.$store.commit("benefits/changeStatusFormUpdateProfil", val);
      },
    },
    statusFormUpdatePhoto: {
      get() {
        return this.$store.getters["benefits/statusFormUpdatePhoto"];
      },
      set(val: boolean) {
        this.$store.commit("benefits/changeStatusFormUpdatePhoto", val);
      },
    },
    statusFormUpdatePassword: {
      get() {
        return this.$store.getters["benefits/statusFormUpdatePassword"];
      },
      set(val: boolean) {
        this.$store.commit("benefits/changeStatusFormUpdatePassword", val);
      },
    },
  },
  watch: {
    user: {
      // This will let Vue know to look inside the array
      deep: true,

      // We have to move our method to a handler field
      handler() {
        console.log("The list of colours has changed!");
      },
    },
  },
});
</script>
