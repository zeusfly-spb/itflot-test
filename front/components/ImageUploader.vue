<template>
  <div class="mb-3">
    <img
      class="test"
      v-if="fileUrl"
      :src="fileUrl"
      alt="uploaded image"
    />
    <input
      v-if="!saved"
      type="file"
      accept="image/*"
      @change="loadImage"
    >
    <v-btn
      v-if="!saved"
      :disabled="!file"
      @click="uploadImage"
    >
      Сохранить
    </v-btn>
  </div>
</template>

<script>
export default {
  name: 'ImageUploader',
  data() {
    return {
      saved: false,
      file: null,
      fileUrl: null,
    };
  },
  methods: {
    openFileDialog() {
      document.getElementById('file-input').click();
    },
    loadImage(e) {
      const reader = new FileReader();
      const file = e.target.files[0];

      reader.onload = (event) => {
        this.file = file;
        this.fileUrl = event.target.result;
      };

      if (file) {
        reader.readAsDataURL(file);
      }
    },
    async uploadImage() {
      const config = {
        headers: {
          'content-type': 'multipart/form-data',
        }
      };
      let data = new FormData();
      data.append('image', this.file);
      const image = await this.$axios.$post('/api/images/add', data, config);
      this.$emit('newImageId', image.id);
      this.saved = true;
    }
  },
};
</script>
<style scoped>
.test {
  height: 200px!important;
  background: #4a5568!important;
}
</style>
