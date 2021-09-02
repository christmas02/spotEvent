<template>
  <default-layout :padding="false">
    <div class="main">
      <jumbotron :image="require('../assets/images/jmbg2.png')">
        <h1 class="content-title">Contactez-nous</h1>
        <div class="description">
          <p>
            Pour plus d'infos, notre équipe bienveillante se tient à votre
            disposition pour vous aider
          </p>
        </div>
      </jumbotron>
    </div>

    <div class="main">
      <section>
        <div class="row">
          <div class="col-md-4">
            <v-list-item class="my-info">
              <v-list-item-avatar color="primary">
                <v-icon color="white"> mdi-map-marker </v-icon>
              </v-list-item-avatar>

              <v-list-item-content>
                <v-list-item-title class="title"
                  >Localisation</v-list-item-title
                >

                <v-list-item-subtitle class="subtitle">
                  <p class="m-0 p-0">Cocody 2 Plateau Vallon</p>
                  <!-- <p class="m-0 p-0">Abidjan</p> -->
                </v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>

            <v-list-item class="my-info">
              <v-list-item-avatar color="primary">
                <v-icon color="white"> mdi-at </v-icon>
              </v-list-item-avatar>

              <v-list-item-content>
                <v-list-item-title class="title">E-mail</v-list-item-title>

                <v-list-item-subtitle class="subtitle">
                  <p class="m-0 p-0">info@spoteventapp.net</p>
                  <!-- <p class="m-0 p-0">Abidjan</p> -->
                </v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>

            <v-list-item class="my-info">
              <v-list-item-avatar color="primary">
                <v-icon color="white"> mdi-phone </v-icon>
              </v-list-item-avatar>

              <v-list-item-content>
                <v-list-item-title class="title">Contact</v-list-item-title>

                <v-list-item-subtitle class="subtitle">
                  <p class="m-0 p-0 my-2">+225 07 47 61 99 44</p>
                  <p class="m-0 p-0 my-2">+225 05 84 96 93 04</p>
                </v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </div>
          <div class="col-md-8">
            <div>
              <h3 class="form-titile">Envoyez-nous un message</h3>
              <p>Nous vous répondrons dans les plus brefs délais</p>
            </div>
            <div>
              <v-form
                ref="form"
                class="my-5"
                lazy-validation
                @submit.prevent="validate"
              >
                <div class="row">
                  <div class="col-md-6">
                    <v-text-field
                      label="Nom"
                      v-model="nom"
                      :rules="requiredRules"
                      outlined
                    ></v-text-field>
                  </div>
                  <div class="col-md-6">
                    <v-text-field
                      label="Prénoms"
                      v-model="prenom"
                      :rules="requiredRules"
                      outlined
                    ></v-text-field>
                  </div>
                  <div class="col-md-6">
                    <v-text-field
                      label="Email"
                      v-model="email"
                      :rules="requiredRules"
                      outlined
                    ></v-text-field>
                  </div>
                  <div class="col-md-6">
                    <v-text-field
                      label="contact téléphonique"
                      outlined
                      v-model="telephone"
                      :rules="requiredRules"
                    ></v-text-field>
                  </div>
                  <div class="col-md-12">
                    <v-textarea
                      label="Message"
                      v-model="message"
                      :rules="requiredRules"
                      outlined
                    ></v-textarea>
                  </div>
                </div>
                <!-- <v-btn color="primary" type="submit" :disabled="loading">{{
                  loading ? "Veuillez patienter ..." : ""
                }}</v-btn> -->
                <div>
                  <v-btn color="primary" type="submit" :disabled="loading">
                    <template v-if="loading">Veuillez patienter ...</template>
                    <v-icon v-else>mdi-arrow-right</v-icon>
                  </v-btn>
                </div>
              </v-form>
            </div>
          </div>
        </div>
      </section>
    </div>

    <section class="maps">
      <div class="main">
        <div class="text-center">
          <h3 class="form-titile">Trouvez-nous sur google</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam
            dolores neque ratione voluptates.
          </p>
        </div>
        <!-- <div>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.626502442513!2d-4.021626684674619!3d5.320813537448535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1ebbecfcdfd21%3A0xe0ff20358d182a30!2sCASH%20CENTER%20PLATEAU!5e0!3m2!1sfr!2sci!4v1621328265517!5m2!1sfr!2sci"
            height="450"
            style="border: 0; width: 100%"
            allowfullscreen=""
            loading="lazy"
          ></iframe>
        </div> -->
        <div style="width: 100%">
          <iframe
            width="100%"
            height="600"
            frameborder="0"
            scrolling="no"
            marginheight="0"
            marginwidth="0"
            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=cocody%20angr%C3%A9%2012%C3%A8me+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
          ></iframe
          ><a href="https://www.maps.ie/draw-radius-circle-map/"
            >Easy radius map</a
          >
        </div>
      </div>
    </section>
  </default-layout>
</template>

<script lang="ts">
import Vue from "vue";
import validationsMixin from "@/mixins/validations.mixin";
export default Vue.extend({
  name: "Home",
  mixins: [validationsMixin],
  data() {
    return {
      loading: false,
      nom: "" as string,
      prenom: "" as string,
      telephone: "" as string,
      email: "" as string,
      message: "" as string,
    };
  },
  methods: {
    async validate(): Promise<void> {
      this.loading = true;
      // @ts-ignore
      if (this.$refs.form.validate()) {
        // await this.actions(
        //   this.oldPassword,
        //   this.password,
        //   this.confirmPassword
        // );
        this.loading = false;
      } else {
        this.$swal({
          title: "Erreur",
          text: "Veuillez remplir correctement tous les champs!",
          icon: "error",
        });
        console.log("erreur");
      }
    },
    async action(): Promise<void> {},
  },
});
</script>

<style scoped>
.main section {
  padding-top: 80px;
  padding-bottom: 80px;
}

section.maps {
  background: #f9faff;
  padding-top: 40px !important;
  padding-bottom: 40px !important;
}
.main {
  margin: 0 auto;
}
.my-info {
  background: #f9faff;
  margin-bottom: 30px;
  width: 90%;
}

.my-info .title {
  font-size: 25px;
}

.my-info .subtitle {
  font-size: 15px;
}

.more-infos {
  font-size: 45px;
  margin: 0;
  font-weight: bolder;
}

.content-title {
  margin-bottom: 20px;
}

.content-title::after {
  content: "";
  display: block;
  width: 200px;
  height: 6px;
  background: var(--primary);
  border-radius: 10px;
}

.description {
  width: 35%;
}

.form-titile {
  font-weight: bold;
  font-size: 2.8rem;
}
</style>
