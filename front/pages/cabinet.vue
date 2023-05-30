<template>
  <v-row justify="center" align="start">
    <v-col
      v-if="!saved"
      cols="20" sm="10" md="8"
      style="background: aliceblue;"
    >
      <v-card
        elevation="0"
      >
        <v-card-title>
          Добавление объявления
        </v-card-title>
        <v-card-text style="height: 84%">
          <v-text-field
            label="Название объявления"
            v-model="name"
          />
          <ImageUploader
            v-for="i in Array(fileCountLimit)"
            :key="i"
            @newImageId="onUpload"
          />
        </v-card-text>
        <v-card-actions>
          <v-spacer/>
          <v-btn
            :disabled="!canSave"
            @click="save"
          >
            Сохранить
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
    <v-col
      cols="20" sm="10" md="8"
      v-else
    >
      <v-card>
        <v-card-text>
          Объявление
          <NuxtLink :to="`/adv/${saved.slug}`">
            {{ saved.name }}
          </NuxtLink>
          сохранено
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import ImageUploader from '../components/ImageUploader.vue';
export default {
  name: 'Cabinet',
  data: () => ({
    saved: null,
    name: '',
    imageIds: [],
    fileCountLimit: 10,
  }),
  computed: {
    canSave() {
      return !!this.name.length && !!this.imageIds.length;
    }
  },
  methods: {
    onUpload(id) {
      this.imageIds.push(id);
    },
    async save() {
      const data = { name: this.name, image_ids: this.imageIds };
      this.saved = await this.$axios.$post('/api/advert/add', { ...data });
    }
  },
  components: {
    ImageUploader
  }
}
</script>
