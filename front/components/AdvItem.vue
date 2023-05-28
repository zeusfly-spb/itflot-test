<template>
  <div
    class="adv-item"
    @click="redirect"
  >
    <div class="field">{{ item.id }}</div>
    <div class="field">{{ item.name }}</div>
    <div class="field"><em>{{ item.user.name }}</em></div>
    <div class="field">
      <img
        style="max-height: 7em"
        :src="firstImagePath && storageUrl + firstImagePath || null"
        alt=""
      />
    </div>
  </div>
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
.adv-item {
  cursor: pointer;
  display: flex;
  flex-direction: row;
  margin: .3em;
}
.field {
  margin-right: .3em;
}
</style>