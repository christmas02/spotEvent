<template>
  <footer class="my-footer default-padding">
    <div class="row">
      <div class="col-md-4">
        <div>
          <v-img
            style="width: 50%"
            :src="require('../../assets/light-logo.png')"
          ></v-img>
        </div>
        <p>
          Constituez votre "équipe qui gagne" pour votre mariage grâce à Spot
          Event, l'annuaire nuptial digital
        </p>
        <div>
          <v-btn
            icon
            color="primary"
            href=" https://www.facebook.com/spoteventapp/"
            ><v-icon>mdi-facebook</v-icon></v-btn
          >
          <v-btn
            icon
            color="primary"
            href="https://www.instagram.com/spoteventapp/"
            ><v-icon>mdi-instagram</v-icon></v-btn
          >
        </div>
      </div>
      <div class="offset-md-1 col-md-7 d-none d-md-block">
        <div class="row mt-md-5">
          <div class="col-md-3">
            <ul class="footer-list">
              <li>
                <h4 class="list-title">Categories</h4>
              </li>
              <li v-for="link in categories" :key="link">
                <router-link class="footer-link" to="/" exact>{{
                  link
                }}</router-link>
              </li>
            </ul>
          </div>
          <div class="col-md-9">
            <ul class="footer-list">
              <li>
                <h4 class="list-title">Prestataires</h4>
              </li>
              <div class="row">
                <div
                  class="col-md-4"
                  v-for="(col, i) in providers"
                  :key="col.length.toString() + i"
                >
                  <li v-for="link in col" :key="link">
                    <router-link class="footer-link" to="/" exact>{{
                      link
                    }}</router-link>
                  </li>
                </div>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
  data() {
    return {
      categories: ["Mariages", "Baptêmes", "Anniversaires"],
      providers: [
        [
          "Salles / Lieux de réception",
          "Photographe",
          "Vidéaste",
          "Sonorisation",
          "Voiture",
        ],
        [
          "Décoration",
          "Logistique",
          "Faire part",
          "Fleuristes",
          "Mise en beauté",
        ],
        ["Traiteur", "Cambuse", "Tenues", "Mise au vert", "Lune de miel "],
      ],
    };
  },
};
</script>

<style scoped>
.my-footer {
  background-color: #303749 !important;
  padding-top: 3%;
  padding-bottom: 5%;
  color: #fff;
}

.footer-list {
  list-style-type: none;
}

.footer-link {
  font-weight: 300;
  color: #fff;
  text-decoration: none;
}

li {
  margin-bottom: 15px;
}

p {
  margin-top: 40px;
  font-weight: 300;
}
</style>
