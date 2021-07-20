<template>
  <v-dialog
    v-model="isModal"
    @keydown.esc="closeDialog"
    @click:outside="closeDialog"
    width="500"
  >
    <v-card class="px-10 px-8">
      <!-- <v-card-title class="text-h5 grey lighten-2">
        Privacy Policy
      </v-card-title> -->

      <!-- <v-card-text v-if="hasNumber"> -->
      <div v-if="hasNumber" class="d-flex flex-column">
        <div class="d-flex align-center my-5">
          <v-icon size="45" class="mr-5">mdi-account</v-icon>
          <p class="mb-0 text-h5">{{ enterprise }}</p>
        </div>

        <!-- <v-divider></v-divider> -->
        <div class="d-flex align-center my-5">
          <v-icon size="45" class="mr-5">mdi-phone</v-icon>
          <p class="mb-0 text-h5">papa {{ phone_service }}</p>
        </div>
      </div>
      <div v-else class="py-8">
        <div class="d-flex align-center my-5">
          <v-icon size="45" class="mr-5">mdi-phone</v-icon>
          <p class="mb-0 text-h5">Desolé Il n'y a aucun contact</p>
        </div>
        <!-- <p class="text-h5 mb-0">Desolé Il n'y a aucun contact</p> -->
      </div>
      <!-- </v-card-text> -->
      <!-- <v-card-text v-else> Il n'y a pas de numero </v-card-text> -->

      <!-- <v-divider></v-divider> -->

      <!-- <v-card-actions>
        <v-spacer></v-spacer> -->
      <!-- <v-btn color="primary" text @click="dialog = false"> I accept </v-btn> -->
      <!-- </v-card-actions> -->
    </v-card>
  </v-dialog>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  model: {
    prop: "isModal",
    event: "change",
  },
  props: {
    isModal: {
      type: Boolean,
      required: true,
      default: false,
    },
    hasNumber: {
      type: Boolean,
      required: true,
      default: false,
    },
    phone_service: {
      type: String,
      required: false,
    },
    enterprise: {
      type: String,
      required: false,
    },
  },
  methods: {
    closeDialog() {
      this.$emit("change", false);
      // this.$emit("input", false);

      // this.$store.commit("benefits/resetStatusFormUpdatePhotoAndProfil");
    },
  },
});
</script>

<style>
</style>