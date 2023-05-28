<template>
  <div>
    <div style="height: 15em"></div>
    <v-layout align-center justify-center>
    <v-flex xs12 md3 class="grey lighten-4">
      <v-container class="text-xs-center">
        <v-card>
          <v-card-title primary-title>
            <h4>Вход</h4>
          </v-card-title>
            <v-text-field
              label="email"
              class="mr-4 ml-4"
              v-model="login.email"
              @keyup.enter="userLogin"
            />
            <v-text-field
              class="mr-4 ml-4"
              label="Пароль"
              type="password"
              v-model="login.password"
              @keyup.enter="userLogin"
            />
            <v-card-actions>
              <v-spacer/>
              <v-btn
                primary
                @click="userLogin"
              >
                ВХОД
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
  name: 'LoginPage',
  data: () =>({
    login: {
      email: '',
      password: ''
    }
  }),
  methods: {
    async userLogin() {
      try {
        let response = await this.$auth.loginWith('local', { data: this.login });
        console.log(response)
      } catch (err) {
        console.log(err);
      }
    }
  },
  mounted() {
    console.log('This redirect: ' + this.$auth.user);
  }
}
</script>

<style scoped>

</style>