<template>
  <default-layout :padding="false">
    <loading
      :active="benefit ? false : true"
      :opacity="0.8"
      loader="spinner"
      :can-cancel="false"
      color="#fbb231"
      :is-full-page="true"
    ></loading>

    <provider-contact-form-modal
      :provider="idProvider"
    ></provider-contact-form-modal>

    <div id="benefit-page" v-if="benefit">
      <div class="main">
        <div>
          <!-- skeleton -->
          <v-skeleton-loader
            transition="scale-transition"
            type="card"
            :loading="benefit ? false : true"
          >
            <jumbotron :image="benefit.path_img | createImagePath">
              <div
                class="
                  d-md-flex
                  justify-content-md-between
                  align-items-md-center
                "
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
                    <h1 class="content-title">
                      {{ benefit.name | capitalize }}
                    </h1>
                    <div class="content-subtitle my-5">
                      <p>
                        {{ benefit.presentation | truncate(250) }}
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
                <div class="col-md-6 d-none d-md-block">
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
                <v-btn color="primary" text x-large to="/accueil">
                  <v-icon>mdi-arrow-left</v-icon>
                  Retour
                </v-btn>
                <div>
                  <favorite-btn :benefit="benefit"></favorite-btn>
                  <!-- start -->

                  <!-- <v-menu offset-y>
                    <template v-slot:activator="{ on, attrs }">
                      <v-btn
                        icon
                        x-large
                        link
                        @click="shareModals = true"
                        color="primary"
                      >
                        <v-icon x-large v-bind="attrs" v-on="on"
                          >mdi-share-variant</v-icon
                        >
                      </v-btn>
                    </template>
                    <v-list color="transparent">
                      <v-list-item v-for="(item, index) in items" :key="index">
                        <v-list-item-icon>
                          <v-icon>mdi-clock</v-icon>
                        </v-list-item-icon>
                      </v-list-item>
                    </v-list>
                  </v-menu> -->

                  <!-- end -->

                  <v-tooltip top>
                    <template v-slot:activator="{ on, attrs }">
                      <v-btn
                        icon
                        x-large
                        link
                        @click="shareModals = true"
                        color="primary"
                      >
                        <v-icon x-large v-bind="attrs" v-on="on"
                          >mdi-share-variant</v-icon
                        >
                      </v-btn>
                    </template>
                    <span>Partager sur les reseaux sociaux</span>
                  </v-tooltip>
                </div>
              </div>
            </jumbotron>
          </v-skeleton-loader>
          <share-modal
            :benefit="benefit"
            :shareModals.sync="shareModals"
          ></share-modal>
        </div>
        <div class="main mx-auto mt-md-5">
          <div class="row">
            <div class="col-md-7 left">
              <div class="section d-md-none d-block">
                <h2 class="section-title">Réalisations</h2>
                <div>
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
              <!-- <div class="section">
                <h2 class="section-title">Qui sommes-nous en video</h2>
                <div>
                  <video width="100%" height="250" controls>
                    <source
                    src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"
                    type=video/mp4>
                  </video>
                </div>
              </div> -->
              <div class="section">
                <h2 class="section-title">Description</h2>
                <div>
                  <p>{{ benefit.description }}</p>
                </div>
                <!-- <div class="calendar"> -->
                <!-- <h2 class="section-title">Agenda</h2> -->
                <!-- <div class="">
                    <div class="d-flex justify-left">
                      <v-badge bottom inline left overlap color="red">
                        designe les jours d'indisponibilité du
                        prestataire</v-badge
                      >
                    </div>
                  </div> -->
                <!-- <div class="col-md-12">
                    <agenda></agenda>
                   
                  </div> -->
                <!-- </div> -->
              </div>

              <div>
                <comment-rating-user
                  v-if="isConnected"
                  :id_prestataire="id_prestataire"
                  :id_user="id_user.toString()"
                  :currentId="currentId"
                ></comment-rating-user>
              </div>
              <div class="avisUser">
                <h1>Avis Utilisateurs</h1>
                <comment-rating-grid
                  :currentId="currentId"
                ></comment-rating-grid>
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
              <div class="section pub">
                <!-- <h2 class="section-title">Panneau</h2> -->
                <!-- <div>
                  <v-img
                    :src="require('../assets/images/jmbg2.png')"
                    class="w-100"
                    height="300"
                  ></v-img>
                </div> -->
                <pub :routeName="routeName" :width="350"></pub>
              </div>
              <div class="section">
                <h2 class="section-title">Contacts</h2>
                <p>Entrez en contact avec le prestataire.</p>
                <div>
                  <auth-btn
                    :handler="displayPhoneNumber"
                    :disabled="benefit.actif_phone == 0"
                  >
                    <v-icon>mdi-phone</v-icon>
                  </auth-btn>

                  <auth-btn
                    :handler="displayWhatsappNumber"
                    :disabled="benefit.actif_whatsapp == 0"
                  >
                    <v-icon>mdi-whatsapp</v-icon>
                  </auth-btn>

                  <v-btn
                    :disabled="!isConnected || benefit.messagerie == 0"
                    icon
                    color="primary"
                    x-large
                    @click="chat"
                  >
                    <!-- :disabled="benefit.messagerie == 0" -->
                    <v-icon>mdi-message-processing</v-icon>
                  </v-btn>

                  <v-btn icon color="primary" x-large @click="showContactForm">
                    <!-- <v-btn icon color="primary" x-large @click="smsPhone"> -->
                    <v-icon>mdi-email</v-icon>
                  </v-btn>
                  <!-- Modal  Number Phone -->
                  <social-dialog v-model="all"></social-dialog>
                  <!-- :hasNumber="hasNumber"
                    :enterprise="enterprise"
                    :phone_service="phone_service"
                    :phone2_service="phone2_service" -->
                </div>
              </div>
              <div
                class="section"
                v-if="benefit.lien_facebook || benefit.lien_instagram"
              >
                <h2 class="section-title">Reseaux sociaux</h2>
                <p>Rejoignez-nous sur les réseaux sociaux</p>
                <div>
                  <v-btn
                    icon
                    color="primary"
                    x-large
                    tag="a"
                    :href="benefit.lien_facebook"
                    v-if="benefit.lien_facebook"
                    target="_blank"
                  >
                    <v-icon>mdi-facebook</v-icon>
                  </v-btn>
                  <v-btn
                    icon
                    color="primary"
                    x-large
                    tag="a"
                    v-if="benefit.lien_instagram"
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
import yanDate from "../components/yanDate.vue";
import pub from "../components/pub.vue";
import shareModal from "../components/shareModal.vue";
import CommentRatingUser from "@/components/CommentRatingUser.vue";
import CommentRatingGrid from "@/components/CommentRatingGrid.vue";
import utilsMixin from "../mixins/utils.mixin";
import { Benefit, IFindPrestataire } from "../interfaces/benefit.interface";
import { BenefitService } from "../services/benefit.service";
import { ISlider } from "@/interfaces/provider.interface";
import ProviderContactFormModal from "../components/ProviderContactFormModal.vue";
import FavoriteBtn from "../components/FavoriteBtn.vue";
import { AppService } from "../services/app.service";
import SocialDialog from "@/components/socialDialog.vue";
import Agenda from "../components/Agenda.vue";
// import ChatBot from "../components/ChatBot.vue";

export default Vue.extend({
  name: "Benefit",
  mixins: [utilsMixin],
  inject: {
    theme: {
      default: { isDark: false },
    },
  },

  data() {
    return {
      model: 0,
      isModal: false,
      hasNumber: false,
      dialog: false,
      slides: [] as ISlider[],
      idProvider: null,
      isChat: true,
      userData: null as unknown as Benefit,
      id_prestataire: "" as string,
      phone_service: "" as string,
      phone2_service: "" as string,
      enterprise: "" as string,
      currentId: null as unknown as number,
      SocketConnected: false,
      shareModals: false,
      items: [
        { title: "Click Me" },
        { title: "Click Me" },
        { title: "Click Me" },
        { title: "Click Me 2" },
      ],
    };
  },
  async beforeMount(): Promise<void> {
    console.log(this.$route.name, "sino");

    await this.$store.dispatch("benefits/fetchAll");

    await this.findPrestataire();

    // this.id_prestataire = this.$store.getters["benefits/one"](
    //   this.currentId
    // ).id_user.toString();

    await this.updateSlder(this.userData.id.toString());
    this.id_prestataire = this.userData.id_user.toString();
  },
  // beforeRouteEnter(_: any, __: any, next: any) {
  //   if (!sessionStorage.getItem("benefitId")) {
  //     next("/");
  //   } else {
  //     next();
  //   }
  // },
  components: {
    BenefitsGrid,
    ProviderContactFormModal,
    FavoriteBtn,
    CommentRatingUser,
    CommentRatingGrid,
    SocialDialog,
    yanDate,
    Agenda,
    pub,
    shareModal,
  },
  computed: {
    routeName(): string {
      return this.$route.name ? this.$route.name : "";
    },
    id_user() {
      return this.$store.getters["auth/user"].id;
    },
    slug(): string {
      return this.$route.params.slug;
    },
    benefit(): Benefit {
      return this.$store.getters["benefits/one"](this.currentId);
    },
    others(): Benefit[] {
      return this.$store.getters["benefits/others"](this.currentId);
    },
    url() {
      return this.$route.path;
    },
    // async currentId() {
    //   // return localStorage.getItem("benefitId") as string;

    // },
    isComment(): boolean {
      return this.$store.getters["auth/isComment"];
    },
    isConnected() {
      return this.$store.getters["auth/isConnected"];
    },
    all: {
      get() {
        return {
          isModal: this.isModal,
          hasNumber: this.hasNumber,
          enterprise: this.enterprise,
          phone_service: this.phone_service,
          phone2_service: this.phone2_service,
        };
      },
      set(
        isModal: boolean,
        hasNumber: boolean,
        enterprise: string,
        phone_service: string,
        phone2_service: string
      ) {
        this.isModal = isModal;
        this.hasNumber = hasNumber;
        this.enterprise = enterprise;
        this.phone_service = phone_service;
        this.phone2_service = phone2_service;
      },
    },
  },

  methods: {
    async smsPhone(): Promise<void> {
      console.log("bibop");
      const service = new AppService();
      const payload = {
        id_utilisateur: this.$store.getters["auth/id"],
        id_prestataire: this.benefit.id_user,
        type_bottom: "télephone",
      };

      const { actionStatu } = await service.phoneOrWaClick(payload);
      if (actionStatu == 1) {
        console.log("action reussi", payload);
      } else {
        console.log("action echouée", payload);
      }
    },
    async smsWa(): Promise<void> {
      console.log("bibop");
      const service = new AppService();
      const payload = {
        id_utilisateur: this.$store.getters["auth/id"],
        id_prestataire: this.benefit.id_user,
        type_bottom: "whatsapp",
      };

      const { actionStatu } = await service.phoneOrWaClick(payload);
      if (actionStatu == 1) {
        console.log("action reussi", payload);
      } else {
        console.log("action echouée", payload);
      }
    },
    async displayPhoneNumber(): Promise<void> {
      const service = new AppService();
      const id_user = this.$store.getters["auth/id"];
      const { statu } = await service.phoneClick({
        id_user,
        id_pres: this.benefit.id_user.toString(),
      });

      // const { actionStatu } = await service.phoneOrWaClick({
      //   id_utilisateur: this.$store.getters["auth/id"],
      //   id_prestataire: this.benefit.id_user,
      //   type_bottom: "télephone",
      // });

      if (statu == 1) {
        this.phone_service = this.benefit.phone_service;
        // console.log(this.benefit.phone2_service);

        this.phone2_service = this.benefit.phone2_service;
        this.hasNumber = true;
        this.isModal = true;
        this.enterprise = this.benefit.name;
        console.log("gwouuuu");

        const html = `
          <h2>${this.benefit.phone_service}</h2>
          <h2>${this.benefit.phone2_service}</h2>
        `;
        // this.$swal({
        //   html,
        // });
        await this.smsPhone();
      } else {
        this.hasNumber = false;
        this.isModal = true;
      }
    },
    async displayWhatsappNumber(): Promise<void> {
      const service = new AppService();
      const id_user = this.$store.getters["auth/id"];
      const { statu } = await service.phoneClick({
        id_user,
        id_pres: this.benefit.id_user.toString(),
      });

      if (statu == 1) {
        this.enterprise = this.benefit.name;

        this.phone_service = this.benefit.phone_whastapp; // this.$swal(this.benefit.phone_whastapp);
        this.phone2_service = null; // this.$swal(this.benefit.phone_whastapp);
        this.hasNumber = true;
        this.isModal = true;
        // this.$swal(this.benefit.phone_whastapp);
        await this.smsWa();
      } else {
        this.hasNumber = false;
        this.isModal = true;
      }
    },
    showContactForm() {
      this.$store.commit("contactModal", true);
    },
    async updateSlder(benefitId: string) {
      const benefit = this.$store.getters["benefits/one"](benefitId);

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
    chat(): void {
      this.$store.commit("auth/updateIdBenefitToChat", this.benefit.id_user);
      this.$router.push({ name: "Chat" });
    },
    async findPrestataire(slug: string): Promise<void> {
      // Items have already been loade
      // Lazily load input items
      const service = new BenefitService();
      let urlParams = this.$route.params.slug;
      // console.log(urlParams);

      const result: IFindPrestataire = await service.findPrestataire(urlParams);

      if (result.statu == 1) {
        // return result.findPrestataire.id.toString();
        // localStorage.setItem("benefitId", result.findPrestataire.id.toString());
        this.userData = result.findPrestataire;
        this.currentId = result.findPrestataire.id;
      }
      // return "0";
    },
  },
  watch: {
    async currentId(n, o) {
      this.id_prestataire =
        this.$store.getters["benefits/one"](n).id_user.toString();
      await this.updateSlder(n.toString());
      console.log("bingoo");

      // await this.findPrestataire();
    },
    async slug(n, o) {
      await this.findPrestataire();
    },
  },
});
</script>

<style scoped>
#benefit-page {
  margin-top: 25px;
}
.section {
  margin-bottom: 100px;
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
.avisUser {
  margin-top: 100px;
  margin-bottom: 100px;
}

@media screen and (max-width: 425px) {
  .content-subtitle {
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
  }
  .content-title {
    text-align: center;
    font-size: 55px;
  }
  .provider-pics {
    width: 100%;
  }
}

/*dojdojdpid *** */
</style>
