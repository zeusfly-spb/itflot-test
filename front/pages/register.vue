<template>
  <div>
    <div style="height: 10em"></div>
    <v-layout align-center justify-center>
    <v-flex xs12 md3 class="grey lighten-4">
      <v-container class="text-xs-center">
        <v-card>
          <v-card-title primary-title>
            <h4>Регистрация</h4>
          </v-card-title>
            <v-text-field
              label="Имя"
              class="mr-4 ml-4"
              v-model="register.name"
            />
            <v-text-field
              label="email"
              class="mr-4 ml-4"
              v-model="register.email"
            ></v-text-field>
            <v-text-field
              class="mr-4 ml-4"
              label="Пароль"
              type="password"
              v-model="register.password"
            />
            <v-text-field
              class="mr-4 ml-4"
              label="Подтверждение пароля"
              type="password"
              v-model="register.password_confirmation"
            />
            <v-card-actions>
              <v-spacer/>
              <v-btn
                @click="userRegister"
              >
                Регистрация
              </v-btn>
            </v-card-actions>

        </v-card>
      </v-container>
    </v-flex>
    </v-layout>
  </div>
</template>

<script>
export default {
  name: 'RegisterPage',
  data: () =>({
    register: {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
    }
  }),
  methods: {
    async userRegister() {
      try {
        await this.$axios.$post('/api/register', { ...this.register });
        this.$router.push('/login')
      } catch (e) {
        console.log(e);
      }
    }
  }
}
</script>

<style scoped>

</style>