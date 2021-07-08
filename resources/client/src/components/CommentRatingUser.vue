<template>
  <v-slide-y-transition hide-on-leave>
    <div class="ratingUser" v-if="isComment">
      <div class="review-card">
        <div class="review-header">
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
          <!-- <div class="review-date">Feb 13, 2021</div> -->
          <div class="share-group">
            <v-btn
              depressed
              color="primary"
              :disabled="rating == 0"
              @click="send"
            >
              Valider
            </v-btn>
          </div>
        </div>
      </div>
    </div>
  </v-slide-y-transition>
</template>

<script lang="ts">
import Vue from "vue";
import ISendComment from "@/interfaces/comment.interface";
import { AuthService } from "@/services/auth.service";
import {
  IListComment,
  IResultListComment,
} from "@/interfaces/comment.interface";
export default Vue.extend({
  props: {
    id_prestataire: {
      type: String,
      required: true,
    },
    id_user: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      rating: 0,
      comment: "",
      size: 5,
      isComment: false,
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
      const userService = new AuthService();

      const result = await userService.sendComment(comment);

      if (result.statu == 1) {
        console.log("message envoyé effectué");
        this.$store.commit("auth/updateIsComment", false);
        this.isComment = false;
        this.getListComment();
      } else {
        console.log("erreur");
      }
    },
    async getListComment(): Promise<void> {
      const userService = new AuthService();
      let id_prestataire = this.$store.getters["benefits/one"](
        this.$route.params.id
      ).id_user.toString();
      const prestataire = new Object() as IListComment;
      prestataire.id_prestataire = id_prestataire;
      // console.log(state.user.id);
      const result = await userService.listComment(prestataire);

      if (result.statu == 1) {
        const allUsers = result.resultat.map(
          (el: IResultListComment) => el.id_user
        );
        // console.log(allUsers, "ici");

        let id_user = this.$store.getters["auth/user"].id;
        //if id user is not in id of comment
        if (!allUsers.includes(id_user)) {
          this.isComment = true;
        }
        this.$store.commit("auth/updateListComment", result.resultat);
        console.log(allUsers, id_user, "icici");
      } else {
        console.log("erreur");
      }
    },
  },
  beforeMount() {
    console.log("water");

    this.getListComment();
  },
  watch: {
    $route(to, from) {
      this.isComment = false;
      this.comment = "";
      this.getListComment();
    },
  },
});
</script>

<style>
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