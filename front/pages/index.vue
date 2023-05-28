<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <AdvItem
        v-for="(item, index) in ads"
        :item="item"
        :key="index"
      />
      <v-pagination
        v-model="page"
        :length="6"
      />
    </v-col>
  </v-row>
</template>

<script>
import AdvItem from '../components/AdvItem.vue';
export default {
  name: 'IndexPage',
  middleware: 'auth',
  data: () => ({
    res: null,
  }),
  computed: {
    ads() {
      return this.res && this.res.data || [];
    },
    page: {
      get() {
        return parseInt(this.$route.query.page);
      },
      set(v) {
        this.$router.push({path: '/', query: {page: v}});
      }
    }
  },
  methods: {
    async loadAds() {
      this.res = await this.$axios.$post('/api/advertisements', {page: this.page});
    }
  },
  created() {
    if (!this.page) {
      this.page = 1;
    } else {
      this.loadAds();
    }
  },
  components: {
    AdvItem
  },
  watch: {
    page(val) {
      val ? this.loadAds() : null;
    }
  }
}
</script>
