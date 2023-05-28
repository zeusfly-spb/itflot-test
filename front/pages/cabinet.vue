<template>
  <v-row justify="center" align="start" fill-height>
    <v-col cols="20" sm="10" md="8" style="background: aliceblue;   height: 80vh;">
      <v-card
        elevation="0"
        style="height: 100%"
      >
        <v-card-title>
          Добавление объявления
        </v-card-title>
        <v-card-text style="height: 84%">
          <v-text-field
            label="Название объявления"
            v-model="name"
          />
          <ImageUploader/>
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
  </v-row>
</template>

<script>
import ImageUploader from '../components/ImageUploader.vue';
export default {
  name: 'Cabinet',
  data: () => ({
    name: ''
  }),
  computed: {
    canSave() {
      return !!this.name.length;
    }
  },
  methods: {
    async save() {
      const res = await this.$axios.$post('/api/advert/add', { name: this.name });
      console.log(res);
    }
  },
  components: {
    ImageUploader
  }
}
</script>

<style scoped>

</style>