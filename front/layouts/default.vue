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
        <div
          v-else
        >
          <NuxtLink
            to="/"
            style="margin-right: 1em"
            v-if="$route.name !== 'index'"
          >
            Общий список
          </NuxtLink>
          <NuxtLink
            to="/cabinet"
            style="margin-right: 1em"
            v-if="$route.name !== 'cabinet'"
          >
            Личный кабинет
          </NuxtLink>
          <NuxtLink
            to=""
            @click.prevent.native="$auth.logout()"
            style="margin-right: 1em"
          >
            Выход
          </NuxtLink>
        </div>

      </v-app-bar>
      <v-main>
        <v-container>
          <Nuxt />
        </v-container>
      </v-main>
      <v-footer
        color="white"
        app
      >
        <v-spacer/>
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
