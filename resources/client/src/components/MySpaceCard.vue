<template>
  <v-card max-width="375" class="mx-auto">
    <v-img
      lazy-src="https://picsum.photos/id/11/10/6"
      :src="user.path_user"
      height="300px"
      dark
    >
      <!-- name: string;
    id: number;
    email: string;
    phone: number;
    path_user: string; -->
      <v-row class="fill-height">
        <v-card-title>
          <v-btn dark icon>
            <v-icon>mdi-chevron-left</v-icon>
          </v-btn>

          <v-spacer></v-spacer>

          <v-btn dark icon class="mr-4">
            <v-icon>mdi-pencil</v-icon>
          </v-btn>

          <v-btn dark icon>
            <v-icon>mdi-dots-vertical</v-icon>
          </v-btn>
        </v-card-title>

        <v-spacer></v-spacer>

        <v-card-title class="white--text pl-12 pt-12">
          <div class="text-h4 pl-12 pt-12">{{ user.name }}</div>
        </v-card-title>
      </v-row>
    </v-img>

    <v-list two-line>
      <v-list-item>
        <v-list-item-icon>
          <v-icon color="indigo"> mdi-phone </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>(+225) {{ user.phone }}</v-list-item-title>
          <v-list-item-subtitle>Mobile</v-list-item-subtitle>
        </v-list-item-content>

        <v-list-item-icon>
          <v-icon>mdi-message-text</v-icon>
        </v-list-item-icon>
      </v-list-item>

      <!-- <v-list-item>
        <v-list-item-action></v-list-item-action>

        <v-list-item-content>
          <v-list-item-title>(323) {{ user.phone }}</v-list-item-title>
          <v-list-item-subtitle>Work</v-list-item-subtitle>
        </v-list-item-content>

        <v-list-item-icon>
          <v-icon>mdi-message-text</v-icon>
        </v-list-item-icon>
      </v-list-item> -->

      <v-divider inset></v-divider>

      <!-- <v-list-item>
        <v-list-item-icon>
          <v-icon color="indigo"> mdi-email </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>aliconnors@example.com</v-list-item-title>
          <v-list-item-subtitle>Personal</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item> -->

      <v-list-item>
        <v-list-item-action></v-list-item-action>

        <v-list-item-content>
          <v-list-item-title>{{ user.email }}</v-list-item-title>
          <v-list-item-subtitle>Work</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider inset></v-divider>

      <!-- <v-list-item>
        <v-list-item-icon>
          <v-icon color="indigo"> mdi-map-marker </v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>1400 Main Street</v-list-item-title>
          <v-list-item-subtitle>Orlando, FL 79938</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item> -->
    </v-list>
  </v-card>
</template>
<script>
export default {
  computed: {
    user: function () {
      return this.$store.getters["auth/user"];
    },
  },
  watch: {
    user: {
      // This will let Vue know to look inside the array
      deep: true,

      // We have to move our method to a handler field
      handler() {
        console.log("The list of colours has changed!");
      },
    },
  },
};
</script>
