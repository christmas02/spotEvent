<template>
  <div>
    <v-card-title>Modification photo</v-card-title>
    <v-file-input
      :rules="rules"
      accept="image/png, image/jpeg, image/jpeg"
      placeholder="Pick an avatar"
      prepend-icon="mdi-camera"
      label="Avatar"
    ></v-file-input>

    <v-btn @click="modify" color="primary" class="mr-4"> Modifier </v-btn>
    <v-btn @click="comeBack" color="success" class="mr-4"> Retour </v-btn>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  data() {
    return {
      rules: [
        (value: any) =>
          !value ||
          value.size < 2000000 ||
          "Avatar size should be less than 2 MB!",
      ],
    };
  },
  methods: {
    modify() {
      //action

      //after all action
      this.$store.commit("benefits/resetStatusFormUpdatePhotoAndProfil");
    },
    comeBack() {
      this.$store.commit("benefits/resetStatusFormUpdatePhotoAndProfil");
    },
  },
});
</script>

<style>
</style>