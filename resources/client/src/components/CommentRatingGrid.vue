<template>
  <div class="commentRatingGrid">
    <div class="review-card">
      <div class="review-header">
        <div class="name-group">
          <div class="initials">J</div>
          <p class="mb-0">John Doe</p>
        </div>
        <div class="rating">
          <v-rating
            v-model="rating[0]"
            readonly
            size="30"
            background-color="primary"
            color="primary"
          ></v-rating>
        </div>
      </div>
      <div class="review-description">
        {{ comment[0] }}
      </div>
      <div class="review-details">
        <div class="review-date">12 Fevrier 2021</div>
      </div>
    </div>
    <div class="review-card">
      <div class="review-header">
        <div class="name-group">
          <div class="initials">J</div>
          <p class="mb-0">Jean Reannot</p>
        </div>
        <div class="rating">
          <v-rating
            v-model="rating[1]"
            readonly
            size="30"
            background-color="primary"
            color="primary"
          ></v-rating>
        </div>
      </div>
      <div class="review-description">
        {{ comment[1] }}
      </div>
      <div class="review-details">
        <div class="review-date">10 Fevrier 2021</div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
export default Vue.extend({
  data() {
    return {
      rating: [4, 1],
      comment: [
        "The device has a clean design, and the metal housing feels sturdy in my hands. Soft rounded corners make it a pleasure to look at.",
        "Je vous conseil vivement ce prestataire, il fait du super boulot dans la sonorisation",
      ],
    };
  },
});
</script>

<style>
.commentRatingGrid .reviews-list {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.commentRatingGrid .review-card {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  width: 100%;
  border-bottom: 1px solid lightgray;
  margin: 10px 0px;
  padding: 15px 0px;
}
.commentRatingGrid .review-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  color: #ffffff;
  font-weight: bold;
  margin: 0px;
}
.commentRatingGrid .name-group {
  display: flex;
  align-items: center;
}

.commentRatingGrid .initials {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 48px;
  height: 48px;
  margin-right: 12px;
  border-radius: 50%;
  background: #d56a6a;
}

.commentRatingGrid .rating i {
  color: #f3d779;
  background-color: green;
}

.commentRatingGrid .review-description {
  font-weight: 400;
  margin: 15px 0px;
}

.commentRatingGrid .review-details {
  display: flex;
  justify-content: flex-start;
  margin: 0px;
  align-items: center;
  color: #8c8aa7;
}

.commentRatingGrid .share-group {
  display: flex;
  padding: 8px;
  border-radius: 5px;
  cursor: pointer;
}

.commentRatingGrid .name-group p {
  color: black;
}
</style>