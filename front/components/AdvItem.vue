<template>
  <div class="adv-item">
    <div class="field">{{ item.id }}</div>
    <div class="field">{{ item.name }}</div>
    <div class="field">image</div>
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
  }
}
</script>

<style scoped>
.adv-item {
  display: flex;
  flex-direction: row;
  margin: .3em;
}
.field {
  margin-right: .3em;
}
</style>