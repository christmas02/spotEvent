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
        :src="defaultUrl + pathUser"
        height="340px"
        dark
      >
        <v-row class="fill-height">
          <v-card-title>
            <v-btn color="primary" icon @click="showPhoto">
              <v-icon>mdi-pencil</v-icon>
            </v-btn>
            <v-file-input
              class="d-none"
              :rules="photoRules"
              ref="photoUploader"
              accept="image/png"
              placeholder="Choisissez une photo"
              prepend-icon="mdi-camera"
              label="Avatar"
              @change="onFileChanged"
            ></v-file-input>
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
import { ISaveImage, IUser } from "@/interfaces/auth.interfaces";
import { AuthService } from "@/services/auth.service";
// import UpdatePhoto from
export default Vue.extend({
  components: { UpdatePhotoForm, UpdateProfilForm, UpdatePasswordForm },
  data() {
    return {
      defaultUrl: `${window.location.origin}/storage/`,
      photoRules: [
        (value: any) =>
          !value ||
          value.size < 2000000 ||
          "Avatar size should be less than 2 MB!",
      ],
      pathUser: this.$store.getters["auth/user"].path_user,
    };
  },
  methods: {
    showProfil() {
      this.$store.commit("benefits/changeStatusFormUpdateProfil", true);
    },
    showPhoto() {
      return this.$refs.photoUploader.$refs.input.click();

      // this.$store.commit("benefits/changeStatusFormUpdatePhoto", true);
    },
    showPassword() {
      this.$store.commit("benefits/changeStatusFormUpdatePassword", true);
    },
    async saveImage(MyUser: ISaveImage): Promise<void> {
      const userService = new AuthService();
      console.log(MyUser);

      const result = await userService.saveImage(MyUser);

      if (result.statu == 1) {
        console.log("modification effectué");
        this.$store.commit("benefits/resetStatusFormUpdatePhotoAndProfil");
      } else {
        console.log("erreur");
      }
    },
    onFileChanged(file: File) {
      // this.selectedFile = e.target.files[0];
      const myUser = new Object() as ISaveImage;
      myUser.id_user = this.id;
      myUser.image = file;
      this.saveImage(myUser);

      // do something
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
    id() {
      return this.$store.getters["auth/user"].id.toString();
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
