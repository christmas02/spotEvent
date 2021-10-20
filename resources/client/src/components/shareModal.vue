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
                      :description="benefit.presentation"
                      :quote="benefit.presentation"
                      hashtags="vuejs,vite"
                    >
                      <v-btn color="primary">
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
                      network="facebook"
                      :url="url"
                      :title="benefit.name"
                      :quote="benefit.presentation"
                      hashtags="vuejs,vite"
                    >
                      <v-btn color="primary">
                        <v-icon>mdi-instagram</v-icon>
                        Instagram
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

    <!-- <ShareNetwork
      class="share"
      network="facebook"
      url="https://news.vuejs.org/issues/180"
      title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
      description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
      quote="The hot reload is so fast it\'s near instant. - Evan You"
      hashtags="vuejs,vite"
    >
      <v-tooltip top>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon x-large link color="primary">
            <v-icon x-large v-bind="attrs" v-on="on">mdi-share-variant</v-icon>
          </v-btn>
        </template>
        <span>Partager sur Facebook</span>
      </v-tooltip>
    </ShareNetwork> -->
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
    benefit: {
      type: Object as PropType<Benefit>,
      required: true,
    },
  },
  methods: {
    url() {
      // console.log(this.url, window.location.href);
      return window.location.href;
    },
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
</style>