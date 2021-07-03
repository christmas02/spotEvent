<template>
  <div class="ratingUser">
    <div class="review-card">
      <div class="review-header">
        <div class="name-group">
          <div class="initials">K</div>
          <p class="mb-0">KACOU YANNICK</p>
        </div>
        <div class="rating">
          <v-rating
            v-model="rating"
            size="30"
            background-color="primary"
            color="primary"
          ></v-rating>
        </div>
      </div>
      <div class="review-description">
        <!-- The device has a clean design, and the metal housing feels sturdy in my
        hands. Soft rounded corners make it a pleasure to look at. -->
        <v-textarea
          label="Commentaire"
          :rules="rules"
          :value="comment"
        ></v-textarea>
      </div>
      <div class="review-details">
        <!-- <div class="review-date">Feb 13, 2021</div> -->
        <div class="share-group">
          <v-btn depressed color="primary"> Valider </v-btn>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  data() {
    return {
      rating: 0,
      comment: "",
      size: 5,
    };
  },
});
</script>

<style>
.ratingUser .reviews-list {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.ratingUser .review-card {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  width: 100%;
  /* height: 250px; */
  /* background: #eaeaeb; */
  background: #f3f3f3;
  margin: 10px 0px;
  padding: 15px 0px;
}
.ratingUser .review-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: #ffffff;
  font-weight: bold;
  margin: 0px 45px;
}
.ratingUser .name-group {
  display: flex;
  align-items: center;
}

.ratingUser .initials {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 48px;
  height: 48px;
  margin-right: 12px;
  border-radius: 50%;
  background: #d56a6a;
}

.ratingUser .rating i {
  color: #f3d779;
  background-color: green;
}

.ratingUser .review-description {
  color: #ffffff;
  font-weight: 400;
  margin: 15px 45px;
}

.ratingUser .review-details {
  display: flex;
  justify-content: flex-end;
  margin: 0px 45px;
  align-items: center;
  color: #8c8aa7;
}
.ratingUser .name-group p {
  color: black;
}
</style>