<template>
  <default-layout :padding="false">
    <provider-contact-form-modal
      :provider="idProvider"
    ></provider-contact-form-modal>
    <div id="benefit-page">
      <div class="main">
        <div>
          <jumbotron :image="benefit.path_img | createImagePath">
            <div
              class="d-md-flex justify-content-md-between align-items-md-center"
            >
              <div
                class="
                  col-md-6
                  h-100
                  d-flex
                  flex-column
                  justify-content-between
                "
              >
                <div></div>
                <div>
                  <h1 class="content-title">{{ benefit.name | capitalize }}</h1>
                  <div class="content-subtitle my-5">
                    <p>
                      {{ benefit.presentation | truncate(80) }}
                    </p>
                  </div>
                </div>
                <div class="d-flex">
                  <img
                    :src="benefit.path_icone | createImagePath"
                    height="40px"
                    class="mr-1"
                  />
                  <h2 class="primary--text">{{ benefit.prestation }}</h2>
                </div>
              </div>
              <div class="col-md-6">
                <div class="d-md-flex justify-content-md-center">
                  <v-carousel
                    cycle
                    hide-delimiters
                    v-model="model"
                    height="400"
                    class="provider-pics"
                  >
                    <v-carousel-item
                      v-for="slide in slides"
                      :key="slide.id"
                      :src="slide.path | createImagePath"
                    >
                    </v-carousel-item>
                  </v-carousel>
                </div>
              </div>
            </div>
            <div class="top">
              <v-btn color="primary" text x-large to="/">
                <v-icon>mdi-arrow-left</v-icon>
                Retour
              </v-btn>
              <favorite-btn :benefit="benefit"></favorite-btn>
            </div>
          </jumbotron>
        </div>
        <div class="main mx-auto mt-md-5">
          <div class="row">
            <div class="col-md-7 left">
              <div class="section">
                <h2 class="section-title">Description</h2>
                <p>{{ benefit.description }}</p>
              </div>
            </div>
            <div class="offset-md-1 col-md-4">
              <div class="section">
                <h2 class="section-title">Localisation</h2>
                <h3 class="location-title">{{ benefit.localisation }}</h3>
                <p>
                  {{ benefit.detail_localisation }}
                </p>
              </div>
              <div class="section">
                <h2 class="section-title">Contacts</h2>
                <p>Entrez en contact avec le prestataire.</p>
                <div>
                  <auth-btn :handler="displayPhoneNumber">
                    <v-icon>mdi-phone</v-icon>
                  </auth-btn>

                  <auth-btn :handler="displayWhatsappNumber">
                    <v-icon>mdi-whatsapp</v-icon>
                  </auth-btn>
                  <v-btn
                    icon
                    color="primary"
                    x-large
                    :disabled="benefit.messagerie !== 1"
                  >
                    <v-icon>mdi-message-processing</v-icon>
                  </v-btn>

                  <v-btn icon color="primary" x-large @click="showContactForm">
                    <v-icon>mdi-email</v-icon>
                  </v-btn>
                </div>
              </div>
              <div class="section">
                <h2 class="section-title">Reseaux sociaux</h2>
                <p>Rejoignez-nous sur les réseaux sociaux</p>
                <div>
                  <v-btn
                    icon
                    color="primary"
                    x-large
                    tag="a"
                    :href="benefit.lien_facebook"
                    target="_blank"
                  >
                    <v-icon>mdi-facebook</v-icon>
                  </v-btn>
                  <v-btn
                    icon
                    color="primary"
                    x-large
                    tag="a"
                    :href="benefit.lien_instagram"
                    target="_blank"
                  >
                    <v-icon>mdi-instagram</v-icon>
                  </v-btn>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="other-benefits">
        <div class="default-padding">
          <h2 class="section-title">Autres prestations</h2>
          <benefits-grid :benefits="others"></benefits-grid>
        </div>
      </div>
    </div>
  </default-layout>
</template>

<script lang="ts">
import Vue from "vue";

import BenefitsGrid from "@/components/BenefitsGrid.vue";
import utilsMixin from "../mixins/utils.mixin";
import { Benefit } from "../interfaces/benefit.interface";
import { BenefitService } from "../services/benefit.service";
import { ISlider } from "@/interfaces/provider.interface";
import ProviderContactFormModal from "../components/ProviderContactFormModal.vue";
import FavoriteBtn from "../components/FavoriteBtn.vue";
import { AppService } from "../services/app.service";

export default Vue.extend({
  name: "Benefit",
  mixins: [utilsMixin],
  data() {
    return {
      model: 0,
      dialog: false,
      slides: [] as ISlider[],
      idProvider: null,
    };
  },
  async beforeMount(): Promise<void> {
    await this.$store.dispatch("benefits/fetchAll");

    const benefit = this.$store.getters["benefits/one"](this.$route.params.id);
    this.idProvider = benefit.id_user.toString();

    const service = new BenefitService();
    const result = await service.getSliders(benefit.id_user);

    if (result.statu == 0) {
      this.$swal({
        icon: "error",
        title: "Erreur lors de la recuperation des slides",
      });
    } else {
      this.slides = result.listPrestataire;
    }
  },
  components: {
    BenefitsGrid,
    ProviderContactFormModal,
    FavoriteBtn,
  },
  computed: {
    benefit(): Benefit {
      return this.$store.getters["benefits/one"](this.$route.params.id);
    },
    others(): Benefit[] {
      return this.$store.getters["benefits/others"](this.$route.params.id);
    },
  },
  methods: {
    async displayPhoneNumber() {
      const service = new AppService();
      const id_user = this.$store.getters["auth/id"];
      const { statu } = await service.phoneClick({
        id_user,
        id_pres: this.benefit.id_user.toString(),
      });

      console.log(statu);

      if (statu == 1) {
        const html = `
          <h2>${this.benefit.phone_service}</h2>
          <h2>${this.benefit.phone2_service}</h2>
        `;
        this.$swal({
          html,
        });
      }
    },
    displayWhatsappNumber() {
      this.$swal(this.benefit.phone_whastapp);
    },
    showContactForm() {
      this.$store.commit("contactModal", true);
    },
  },
});
</script>

<style scoped>
.section {
  margin-bottom: 40px;
}

.provider-pics {
  width: 70%;
}

.location-title {
  font-size: 1.4rem;
  margin-bottom: 10px;
}

.section-title {
  margin-bottom: 30px;
}

.top {
  padding: 0 4%;
  display: flex;
  position: absolute;
  top: 20px;
  left: 0;
  width: 100%;
  justify-content: space-between;
}

.other-benefits {
  padding: 70px 0;
  background-color: #f4f5f7;
}
</style>
