<template>
  <v-row justify="center" align="start" fill-height>
    <v-col cols="20" sm="10" md="8">
      <v-card
        v-if="adv"
      >
        <v-card-title>
          {{ adv.name }}
        </v-card-title>
        <v-card-text>
          <img
            class="ma-1"
            v-for="(img, index) in adv.images"
            :key="index"
            :src="$store.getters.storageUrl + img.path"
            alt="Advert image"
          />
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import AdvItem from "../../../components/AdvItem.vue";

export default {
  name: 'AdvPage',
  components: {AdvItem},
  data: () => ({
    adv: null,
  }),
  computed: {
    slug() {
      return this.$route.params.slug || null
    }
  },
  methods: {
    async loadAdv() {
      try {
        this.adv = await this.$axios.$get(`/api/advert/show/${this.slug}`);
      } catch (e) {
        console.error(e);
      }
    }
  },
  created() {
    this.slug ? this.loadAdv() : null;
  }
}
</script>
