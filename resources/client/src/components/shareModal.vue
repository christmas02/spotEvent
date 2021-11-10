<template>
  <div>
    <div>
      <v-dialog
        transition="dialog-top-transition"
        v-model="shareModals"
        @keydown.esc="$emit('update:shareModals', false)"
        @click:outside="$emit('update:shareModals', false)"
        width="500"
      >
        <v-card>
          <section class="section">
            <div>
              <div class="d-flex justify-center">
                <div>
                  <v-img
                    width="80"
                    class="logo"
                    :src="require('../assets/dark-logo.png')"
                  >
                  </v-img>
                </div>
              </div>
              <div class="modal mt-3">
                <h2 class="text-center">Partager cette page</h2>
                <p class="text-center">
                  Vous aimez cette page, partagez-la avec vos amis. Ils vous
                  remercierons plus tard.
                </p>
                <div class="d-flex justify-center col-md-8 mx-auto">
                  <div>
                    <ShareNetwork
                      class="share"
                      network="facebook"
                      :url="url"
                      :title="benefit.name"
                      :description="benefit.description"
                      :quote="benefit.presentation"
                      :hashtags="name"
                    >
                      <v-btn color="facebook" @click="goUrl">
                        <!-- @click="$emit('update:shareModals', false)" -->
                        <v-icon>mdi-facebook</v-icon>
                        Facebook
                      </v-btn>
                    </ShareNetwork>
                  </div>
                  <v-spacer></v-spacer>
                  <div>
                    <!-- :description="benefit.presentation" -->
                    <ShareNetwork
                      class="share"
                      network="whatsapp"
                      :url="url"
                      :title="benefit.name"
                      :description="benefit.description"
                      :quote="benefit.presentation"
                      :hashtags="name"
                    >
                      <v-btn
                        color="wha"
                        @click="$emit('update:shareModals', false)"
                      >
                        <v-icon>mdi-whatsapp</v-icon>
                        WhatsApp
                      </v-btn>
                    </ShareNetwork>

                    <!-- <v-btn color="primary">
                      <v-icon>mdi-instagram</v-icon>
                      Instagram
                    </v-btn> -->
                  </div>
                </div>
              </div>
            </div>
          </section>
        </v-card>
      </v-dialog>
    </div>
  </div>
</template>

<script lang="ts">
import Vue, { PropType } from "vue";
import { Benefit } from "../interfaces/benefit.interface";
export default Vue.extend({
  props: {
    shareModals: {
      type: Boolean,
      required: true,
    },
    url: {
      type: String,
      required: true,
    },
    benefit: {
      type: Object as PropType<Benefit>,
      required: true,
    },
  },
  methods: {
    goUrl() {
      // console.log(window.location.href);
      this.$emit("update:shareModals", false);
      console.log("test de lien facebook");
    },
    // url() {
    // console.log(this.url, window.location.href);
    // return "http://spoteventapp.net/prestations/Addic-Art-Prod";
    // return window.location.href;
    // },
  },
  computed: {
    name(): string {
      console.log(this.benefit.name);

      return this.benefit.name.toLowerCase().replaceAll(" ", "_");
    },
    // url(): string {
    //   // return window.location.href;
    //   return "http://spoteventapp.net/prestations/Divine-Amour-Event";
    // },
  },
});
</script>

<style scoped>
.section {
  margin-right: 20px;
  margin-left: 20px;
  margin-top: 15px;
  margin-bottom: 15px;
}

.facebook,
.facebook *,
.wha,
.wha * {
  color: #fff !important;
}

.facebook {
  background-color: #4267b2 !important;
}

.wha {
  background-color: #25d366 !important;
}
</style>