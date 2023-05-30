<template>
  <v-card
    style="padding: 10px!important;"
    class="d-flex align-center justify-space-between mb-2"
    @click="redirect"
  >
    <div class="field">{{ item.id }}</div>
    <div class="field">{{ item.name }}</div>
    <div class="field"><em>{{ item.user.name }}</em></div>
    <img
      style="height: 7em"
      :src="firstImagePath && storageUrl + firstImagePath || null"
      alt=""
    />
  </v-card>
</template>

<script>
export default {
  name: 'AdvItem',
  props: {
    item: {
      type: Object,
      required: true
    }
  },
  computed: {
    firstImagePath() {
      return this.item && this.item.images[0] && this.item.images[0].path || null;
    },
    storageUrl() {
      return this.$store.getters.storageUrl;
    }
  },
  methods: {
    redirect() {
      this.$router.push(`/adv/${this.item.slug}`);
    }
  }
}
</script>

<style scoped>
.field {
  margin-right: .3em;
}
</style>