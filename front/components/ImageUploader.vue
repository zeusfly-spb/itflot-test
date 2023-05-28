<template>
  <div>
    <input type="file" accept="image/*" @change="loadImage">
  </div>
</template>

<script>
export default {
  name: 'ImageUploader',
  data: () => ({
    file: null,
  }),
  methods: {
    loadImage(e) {
      this.file = e.target.files[0];
    }
  }
}
</script>

<style scoped>

</style>