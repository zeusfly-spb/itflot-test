<template>
  <v-row justify="center" align="center" fill-height>
    <v-col cols="8" sm="5" md="3" fill-height >
      <v-card>
        <v-card-title primary-title>
          <h4>Вход</h4>
        </v-card-title>
        <v-text-field
          flat
          filled
          label="email"
          class="mr-4 ml-4"
          v-model="login.email"
          @keyup.enter="userLogin"
        ></v-text-field>
        <v-text-field
          flat
          filled
          class="mr-4 ml-4"
          label="Пароль"
          type="password"
          v-model="login.password"
          @keyup.enter="userLogin"
        ></v-text-field>
        <v-card-actions>
          <v-spacer/>
          <v-btn
            primary
            class="mr-4 mb-4"
            @click="userLogin"
          >
            ВХОД
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-col>
  </v-row>
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
        await this.$auth.loginWith('local', { data: this.login });
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
