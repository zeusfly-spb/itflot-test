<template>
  <v-row justify="center" align="start" fill-height>
    <v-col cols="20" sm="10" md="8" fill-height>
      <div
        v-if="ads.length"
      >
        <AdvItem
          v-for="(item, index) in ads"
          :item="item"
          :key="index"
        />
        <v-pagination
          v-model="page"
          :length="paginatorLength"
        />
      </div>
      <div v-else>
        Список объявлений пуст
      </div>
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
    paginatorLength: 5,
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
      this.res = await this.$axios.$post('/api/advert/', {page: this.page});
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
    },
    res(val) {
      this.paginatorLength = val.last_page;
    }
  }
}
</script>
<style scoped>
.main-list {
  display: flex;
  flex-direction: column;
  height: 100%;
}
</style>
