<template>
  <div v-if="isComment">
    <h3>Vous avez commenté</h3>
  </div>
  <div class="ratingUser" v-else>
    <div class="review-card">
      <div class="review-header row">
        <div class="name-group">
          <div class="initials">{{ user.name.charAt(0) }}</div>
          <p class="mb-0">{{ user.name }}</p>
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
          v-model="comment"
          placeholder="Le commentaire n'est pas obligatoire"
        ></v-textarea>
      </div>
      <div class="review-details">
        <div class="share-group">
          <loading-button :handler="send" type="button">Valider</loading-button>
          <!-- <v-btn depressed color="primary" @click="send"> Valider </v-btn> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import ISendComment from "@/interfaces/comment.interface";
import { AuthService } from "@/services/auth.service";
import {
  IListComment,
  IResultListComment,
} from "@/interfaces/comment.interface";
import LoadingButton from "./global/LoadingButton.vue";
export default Vue.extend({
  components: { LoadingButton },
  props: {
    id_prestataire: {
      type: String,
      required: true,
    },
    id_user: {
      type: String,
      required: true,
    },
    currentId: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      rating: 0,
      comment: "",
      size: 5,
      isComment: false as boolean,
      listComment: true as boolean,
    };
  },
  computed: {
    user() {
      return this.$store.getters["auth/user"];
    },
  },
  methods: {
    send() {
      // console.log("de", this.id_user, "a", this.id_prestataire);
      const toSendComment = new Object() as ISendComment;
      toSendComment.id_prestataire = this.id_prestataire;
      toSendComment.id_user = this.id_user;
      toSendComment.vote = this.rating;

      toSendComment.contenus =
        this.comment == "" ? "Aucun commentaire" : this.comment;

      // console.log(toSendComment);
      this.sendComment(toSendComment);
    },
    async sendComment(comment: ISendComment): Promise<void> {
      this.$store.commit("startLoading");
      const userService = new AuthService();

      const result = await userService.sendComment(comment);

      if (result.statu == 1) {
        console.log("message envoyé effectué");
        this.$store.commit("auth/updateIsComment", false);
        this.comment = "";
        this.rating = 0;
        this.isComment = false;
        this.getListComment();
      } else {
        console.log("erreur");
      }

      this.$store.commit("stopLoading");
    },
    async getListComment(): Promise<void> {
      const userService = new AuthService();
      let id_prestataire = this.$store.getters["benefits/one"](
        this.currentId
      ).id_user.toString();
      const prestataire = new Object() as IListComment;
      prestataire.id_prestataire = id_prestataire;
      // console.log(state.user.id);
      const result = await userService.listComment(prestataire);

      if (result.statu == 1) {
        const allUsers: string[] = result.resultat.map(
          (el: IResultListComment) => el.id_user.toString()
        );
        // console.log(allUsers, "ici");

        let id_user = this.$store.getters["auth/user"].id.toString();
        //if id user is not in id of comment
        this.listComment = false;

        if (allUsers.includes(id_user)) {
          // this.listComment = false;
          this.isComment = true;
        }

        this.$store.commit("auth/updateListComment", result.resultat);
      } else {
        console.log("erreur");
      }
    },
  },
  beforeMount() {
    this.isComment = false;
    this.listComment = true;
    this.getListComment();
  },
  watch: {
    $route(to, from) {
      this.isComment = false;
      this.listComment = true;

      this.getListComment();
    },
  },
});
</script>

<style>
@media screen and (max-width: 425px) {
  .review-details {
    display: flex !important;
    justify-content: center !important;
  }
}
.ratingUser {
  transition: 0.5s;
}
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