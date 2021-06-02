<template>
  <v-row justify="center">
    <v-dialog max-width="600px" v-model="dialog">
      <v-card>
        <v-card-title><h5>Contact</h5></v-card-title>
        <v-card-text>
          <v-container>
            <contact-form :provider="provider"></contact-form>
          </v-container>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script lang="ts">
import Vue, { PropType } from "vue";
import { mapGetters } from "vuex";
import ContactForm from "./forms/ContactForm.vue";
import { IProvider } from "@/interfaces/provider.interface";

export default Vue.extend({
  components: { ContactForm },
  props: {
    provider: {
      type: Object as PropType<IProvider>,
      required: false,
    },
  },
  computed: {
    dialog: {
      get(): boolean {
        return this.$store.getters["contactModal"];
      },
      set(val: boolean) {
        this.$store.commit("contactModal", val);
      },
    },
  },
});
</script>

<style scoped>
</style>