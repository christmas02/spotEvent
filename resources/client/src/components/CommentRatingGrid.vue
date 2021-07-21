<template>
  <div>
    <div class="commentRatingGrid" v-if="comments.length >= 1">
      <div class="review-card" v-for="comment in comments" :key="comment.id">
        <div class="review-header">
          <div class="name-group">
            <div class="initials">{{ comment.nom_client.charAt(0) }}</div>
            <p class="mb-0">{{ comment.nom_client }}</p>
          </div>
          <div class="rating">
            <v-rating
              :value="parseInt(comment.vote)"
              readonly
              size="30"
              background-color="primary"
              color="primary"
            ></v-rating>
          </div>
        </div>
        <div class="review-description">
          {{ comment.contenus }}
        </div>
        <div class="review-details">
          <div class="review-date">{{ getDate(comment.updated_at) }}</div>
        </div>
      </div>
      <!-- <div class="review-card">
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
    </div> -->
    </div>
    <div v-else>
      <p>Aucun Avis</p>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import { AuthService } from "@/services/auth.service";
import {
  ISendComment,
  IListComment,
  IResultListComment,
} from "@/interfaces/comment.interface";
export default Vue.extend({
  data() {
    return {
      id_prestataire: "" as string,
      // comments: [],
    };
  },
  computed: {
    comments() {
      return this.$store.getters["auth/listComment"];
    },
  },
  methods: {
    getDate(localDate: string) {
      let myDate = new Date(localDate);
      const time = localDate.split(" ")[1].split(":").slice(0, 2).join(":");
      return (
        myDate.toLocaleDateString("fr-FR", {
          day: "numeric",
          month: "long",
          year: "numeric",
        }) +
        " " +
        time
      );
    },
    async getListComment(prestataire: IListComment): Promise<void> {
      const userService = new AuthService();

      // console.log(state.user.id);
      const result = await userService.listComment(prestataire);

      if (result.statu == 1) {
        console.log("bien fait");

        this.$store.commit("auth/updateListComment", result.resultat);
      } else {
        //
        this.$store.commit("auth/updateListComment", []);
        console.log("erreur");
      }
    },
  },
  beforeMount() {
    console.log("wano");

    this.id_prestataire = this.$store.getters["benefits/one"](
      this.$route.params.id
    ).id_user.toString();
    this.getListComment({ id_prestataire: this.id_prestataire });
  },
  watch: {
    $route(to, from) {
      console.log(to.params.id, "wano");
      this.id_prestataire = this.$store.getters["benefits/one"](
        this.$route.params.id
      ).id_user.toString();
      this.getListComment({ id_prestataire: this.id_prestataire });
    },
  },
  // beforeDestroy() {
  //   this.$store.commit("auth/updateListComment", []);
  // },
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