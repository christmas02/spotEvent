<template>
  <v-row justify="center" v-if="isAuth">
    <!-- @keydown.esc="closeDialog" @click:outside="closeDialog"  -->
    <v-dialog
      v-model="dialog"
      @keydown.esc="closeDialog"
      @click:outside="closeDialog"
      width="450"
    >
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="closeDialog">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <v-toolbar-title>
          <div class="d-flex">
            <v-img
              style="width: 60px; margin-right: 5px"
              :src="lightLogo"
            ></v-img>
            <h3>Mon profil</h3>
          </div>
        </v-toolbar-title>
        <v-spacer></v-spacer>
      </v-toolbar>
      <v-card>
        <my-space-card></my-space-card>
      </v-card>
    </v-dialog>
  </v-row>
</template>
<script lang="ts">
import Vue from "vue";
import MySpaceCard from "@/components/MySpaceCard.vue";
// @ts-ignore
import lightLogo from "../../assets/light-logo.png";
import { mapGetters } from "vuex";

export default Vue.extend({
  components: { MySpaceCard },
  model: {
    prop: "dialog",
    event: "change",
  },
  props: {
    dialog: {
      type: Boolean,
      required: true,
      default: false,
    },
  },
  data() {
    return {
      lightLogo,
    };
  },
  methods: {
    closeDialog() {
      console.log("fermé");

      this.$emit("change", false);
      // this.$emit("input", false);

      // this.$store.commit("benefits/resetStatusFormUpdatePhotoAndProfil");
    },
  },
  computed: {
    ...mapGetters({
      isAuth: "auth/isConnected",
      user: "auth/user",
    }),
    isAuth(): boolean {
      return this.$store.getters["auth/isConnected"];
    },
  },
});
</script>
<style>
.test {
  width: min-content;
}
</style>