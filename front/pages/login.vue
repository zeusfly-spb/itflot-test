<template>
  <div>
    <form @submit.prevent="userLogin">
      <div>
        <label>Username</label>
        <input type="text" v-model="login.email" />
      </div>
      <div>
        <label>Password</label>
        <input type="text" v-model="login.password" />
      </div>
      <div>
        <button type="submit">Submit</button>
      </div>
    </form>
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