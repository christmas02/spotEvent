<template>
  <v-list three-line>
    <template v-for="(item, index) in favories">
      <!-- <v-subheader
        v-if="item.id"
        :key="item.id"
        v-text="item.name_entreprise"
      ></v-subheader> -->

      <!-- <v-divider v-if="item.id" :key="index" :inset="item.id"></v-divider> -->

      <v-list-item :key="item.id">
        <v-list-item-avatar>
          <v-img :src="item.avatar"></v-img>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title>Nom: {{ item.name }}</v-list-item-title>
          <v-list-item-subtitle
            >Entreprise: {{ item.name_entreprise }}
          </v-list-item-subtitle>
          <v-list-item-subtitle
            >Prestation: {{ item.prestation }}
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </template>
  </v-list>
</template>

<script>
export default {
  data() {
    return {
      //   items: [
      //     { header: "Today" },
      //     {
      //       avatar: "https://cdn.vuetifyjs.com/images/lists/1.jpg",
      //       title: "Brunch this weekend?",
      //       subtitle: `<span class="text--primary">Ali Connors</span> &mdash; I'll be in your neighborhood doing errands this weekend. Do you want to hang out?`,
      //     },
      //     { divider: true, inset: true },
      //     {
      //       avatar: "https://cdn.vuetifyjs.com/images/lists/2.jpg",
      //       title: 'Summer BBQ <span class="grey--text text--lighten-1">4</span>',
      //       subtitle: `<span class="text--primary">to Alex, Scott, Jennifer</span> &mdash; Wish I could come, but I'm out of town this weekend.`,
      //     },
      //     { divider: true, inset: true },
      //     {
      //       avatar: "https://cdn.vuetifyjs.com/images/lists/3.jpg",
      //       title: "Oui oui",
      //       subtitle:
      //         '<span class="text--primary">Sandra Adams</span> &mdash; Do you have Paris recommendations? Have you ever been?',
      //     },
      //     { divider: true, inset: true },
      //     {
      //       avatar: "https://cdn.vuetifyjs.com/images/lists/4.jpg",
      //       title: "Birthday gift",
      //       subtitle:
      //         '<span class="text--primary">Trevor Hansen</span> &mdash; Have any ideas about what we should get Heidi for her birthday?',
      //     },
      //     { divider: true, inset: true },
      //     {
      //       avatar: "https://cdn.vuetifyjs.com/images/lists/5.jpg",
      //       title: "Recipe to try",
      //       subtitle:
      //         '<span class="text--primary">Britta Holt</span> &mdash; We should eat this: Grate, Squash, Corn, and tomatillo Tacos.',
      //     },
      //   ],
    };
  },
  computed: {
    favories() {
      const final = [];
      const favorites = this.$store.getters["auth/favorites"];
      const providers = this.$store.getters["benefits/providers"];
      favorites.forEach((favori) => {
        const items = providers.filter((provider) => provider.id === favori.id);
        favori.avatar = "https://cdn.vuetifyjs.com/images/lists/1.jpg";
        final.push({ ...favori, ...items[0] });
      });

      console.log(final[1]);
      return [final[1]];
    },
  },
  //   beforeMount() {
  //     const final = [];
  //     const favorites = this.$store.getters["auth/favorites"];
  //     const providers = this.$store.getters["benefits/providers"];
  //     favorites.forEach((favori) => {
  //       const items = providers.filter((provider) => provider.id === favori.id);
  //       final.push({ ...favori, ...items[0] });
  //     });

  //     console.log(final);
  //   },
};
</script>

<style>
</style>