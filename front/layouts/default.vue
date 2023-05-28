<template>
  <v-app>
      <v-app-bar
        :flat="true"
        color="white"
        fixed
        app
      >
        <v-spacer/>
        <div
          v-if="!$auth.loggedIn"
        >
          <NuxtLink
            to="/register"
            v-if="$route.name !== 'register'"
          >
            Регистрация
          </NuxtLink>
          <NuxtLink
            to="/login"
            v-if="$route.name !== 'login'"
          >
            Вход
          </NuxtLink>
        </div>
        <v-btn
          v-else
          @click="$auth.logout()"
        >
          Выход
        </v-btn>
      </v-app-bar>
      <v-main>
        <v-container>
          <Nuxt />
        </v-container>
      </v-main>
      <v-footer
        app
      >
        <span>&copy; {{ new Date().getFullYear() }}</span>
      </v-footer>
  </v-app>
</template>

<script>
export default {
  name: 'DefaultLayout',
}
</script>
<style>
a {
  text-decoration: none;
}
</style>
