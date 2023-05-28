<template>
  <div class="adv-item">
    <div>{{ item.id }}</div>
    <div>{{ item.name }}</div>
    <div>image</div>
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
}
</style>