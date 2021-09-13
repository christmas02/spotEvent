<template>
  <default-layout :padding="false">
    <div id="benefit-page">
      <div class="default-padding">
        <!-- <jumbotron :image="require('../assets/about/jmb.png')"> -->
        <jumbotron :image="require('../assets/about/img01.jpg')">
          <div
            class="d-md-flex justify-content-md-between align-items-md-center"
          >
            <div
              class="col-md-6 h-100 d-flex flex-column justify-content-between"
            >
              <div></div>
              <div class="title-container">
                <h1 class="content-title" v-html="contents.appros_titre"></h1>
                <p
                  class="content-subtitle my-5"
                  v-html="contents.apropos_sous_titre"
                ></p>
              </div>
            </div>
          </div>
        </jumbotron>
      </div>
      <div class="main mx-auto pb-4 mt-md-10">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="section">
              <h2
                class="section-title"
                v-html="contents.qui_somme_nous_titre"
              ></h2>
              <p
                class="font-weight-bold"
                v-html="contents.qui_somme_nous_paragraphe"
              ></p>
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
                  max-height="100"
                />
                <!-- height="110" -->
                <h2
                  class="text-primary text-uppercase mt-2"
                  v-html="contents.apropos_service_un_titre"
                ></h2>
                <div class="my-divider"></div>
                <p v-html="contents.apropos_service_un_paragraphe"></p>
              </div>
            </div>
            <div class="col-md-4 text-center">
              <div class="more-info">
                <img
                  :src="require('../assets/about/about1.png')"
                  alt="oki"
                  class="img-fluid"
                />
                <!-- height="110" -->
                <h2
                  class="text-primary text-uppercase mt-2"
                  v-html="contents.apropos_service_deux_titre"
                ></h2>
                <div class="my-divider"></div>
                <p v-html="contents.apropos_service_deux_paragraphe"></p>
              </div>
            </div>
            <div class="col-md-4 text-center">
              <div class="more-info">
                <img
                  :src="require('../assets/about/about2.png')"
                  alt="oki"
                  class="img-fluid"
                />
                <!-- height="110" -->
                <h2
                  class="text-primary text-uppercase mt-2"
                  v-html="contents.apropos_service_trois_titre"
                ></h2>
                <div class="my-divider"></div>
                <p v-html="contents.apropos_service_trois_paragraphe"></p>
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

export default Vue.extend({
  computed: {
    contents(): any {
      return this.$store.getters["aboutContents"];
    },
  },
});
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
  /* width: 30%; */
  max-height: 100px;
}
@media screen and (min-width: 1264px) {
  .title-container {
    width: 60%;
  }
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
}
</style>