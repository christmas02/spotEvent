<template>
  <default-layout :padding="false">
    <div id="benefit-page">
      <div class="default-padding">
        <jumbotron :image="require('../assets/about/jmb.png')">
          <div
            class="d-md-flex justify-content-md-between align-items-md-center"
          >
            <div
              class="col-md-6 h-100 d-flex flex-column justify-content-between"
            >
              <div></div>
              <div class="title-container">
                <h1 class="content-title">A Propos de Nous</h1>
                <p class="content-subtitle my-5">
                  Le répertoire des prestataires de l'événementiel
                </p>
              </div>
            </div>
          </div>
        </jumbotron>
      </div>
      <div class="main mx-auto pb-4">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="section">
              <h2 class="section-title">Qui-sommes nous ?</h2>
              <p class="font-weight-bold">
                Nous sommes une plateforme de mise en relation entre les acteurs
                de l'évènementiel et les personnes désireuses de réaliser un
                évènement. Notre but ultime est de contribuer à la réalisation
                d'évènements marquants, uniques et réussis. Nous y parvenons
                grâce à la collaboration de nos partenaires spécialistes du
                secteur.
              </p>
            </div>
          </div>
          <div class="d-none d-md-flex col-md-6 right">
            <img :src="require('../assets/about/image.png')" height="275" />
          </div>
        </div>
      </div>
      <div class="more">
        <div class="main mx-auto">
          <div class="row">
            <div class="col-md-4 text-center">
              <div class="more-info">
                <img
                  :src="require('../assets/about/about3.png')"
                  alt="oki"
                  class="img-fluid"
                />
                <h2 class="text-primary text-uppercase mt-2">Nos services</h2>
                <div class="my-divider"></div>
                <p>
                  Un catalogue dynamique permettant à de nombreuses personnes de
                  découvrir vos services
                </p>
              </div>
            </div>
            <div class="col-md-4 text-center">
              <div class="more-info">
                <img
                  :src="require('../assets/about/about1.png')"
                  alt="oki"
                  class="img-fluid"
                />
                <h2 class="text-primary text-uppercase mt-2">
                  Outil de communication
                </h2>
                <div class="my-divider"></div>
                <p>
                  Un outil de communication et de marketing pour vous faire
                  gagner en visibilité
                </p>
              </div>
            </div>
            <div class="col-md-4 text-center">
              <div class="more-info">
                <img
                  :src="require('../assets/about/about2.png')"
                  alt="oki"
                  class="img-fluid"
                />
                <h2 class="text-primary text-uppercase mt-2">Notre équipe</h2>
                <div class="my-divider"></div>
                <p>
                  Une équipe disponible pour vous assister et vous accompagner
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </default-layout>
</template>

<script lang="ts">
import Vue from "vue";

export default Vue.extend({});
</script>

<style scoped>
.content-subtitle {
  color: var(--primary);
}

.w-50 {
  width: 50%;
}

.more {
  background-color: rgba(244, 245, 247, 0.7);
  padding-bottom: 150px;
}

.main {
  padding-top: 90px;
}

.section-title {
  margin-bottom: 50px;
}

.my-divider {
  background: #000;
  margin: 0 auto 20px auto;
  height: 5px;
  width: 25%;
}

.more-info {
  width: 95%;
}

.right {
  justify-content: center;
  align-items: flex-end;
  padding-bottom: 50px;
}

.more img {
  width: 30%;
}

.title-container {
  width: 60%;
}
</style>