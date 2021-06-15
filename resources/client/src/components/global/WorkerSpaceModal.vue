<template>
  <v-row justify="center" v-if="isAuth">
    <v-dialog v-model="dialog" @keydown.esc="closeDialog" width="450">
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="closeDialog">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <!-- <v-toolbar-title>Settings</v-toolbar-title> -->
        <v-spacer></v-spacer>
        <!-- <v-toolbar-items>
          <v-btn dark text @click="dialog = false"> Save </v-btn>
        </v-toolbar-items> -->
      </v-toolbar>
      <v-card>
        <!-- <v-card-title><h5>Connexion</h5></v-card-title> -->
        <!-- <v-card-text> -->
        <!-- <v-container class="test"> -->
        <my-space-card></my-space-card>
        <!-- <favorites-grid :favorites="favorites"></favorites-grid> -->
        <!-- </v-container> -->
        <!-- </v-card-text> -->
      </v-card>
    </v-dialog>
  </v-row>
</template>
<script lang="ts">
import Vue from "vue";
import MySpaceCard from "@/components/MySpaceCard.vue";
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
  methods: {
    closeDialog() {
      this.$emit("change", false);
    },
  },
  computed: {
    ...mapGetters({
      isAuth: "auth/isConnected",
      // dialog: "auth/workerSpaceModal",
    }),
  },
});
</script>
<style>
.test {
  width: min-content;
}
</style>