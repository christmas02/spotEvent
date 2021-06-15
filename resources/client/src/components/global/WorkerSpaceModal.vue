<template>
  <v-row justify="center" v-if="isAuth">
    <v-dialog v-model="dialog" @keydown.esc="closeDialog" width="450">

      <v-toolbar dark color="primary">
        <v-btn icon dark @click="closeDialog">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <v-toolbar-title>
          <div class="d-flex">
            <img
             style="width: 60px; margin-right: 5px;"
              :src="require('../../assets/light-logo.png')"
            ></img>
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
      user: "auth/user",
    }),
  },
});
</script>
<style>
.test {
  width: min-content;
}
</style>