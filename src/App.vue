<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" app="">
      <v-list>
        <v-list-item
          links
          v-for="item in items"
          :key="item.titulo"
          :to="item.path"
        >
          <v-list-item-action>
            <v-icon>mdi-{{ item.icono }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>{{ item.titulo }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar class="primary" app>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"> </v-app-bar-nav-icon>
      <v-toolbar-title>
        <h1 class="home ">Cursos Da Vinci</h1>
      </v-toolbar-title>
    </v-app-bar>

    <v-main>
      <v-container fluid>
        <transition
          mode="out-in"
          enter-active-class="animate__animated animate__fadeInLeft"
        >
          <router-view></router-view>
        </transition>
      </v-container>
    </v-main>

    <v-footer height="auto">
      <v-card class="flex" flat tile>
        <v-card-title class="info">
          <v-spacer></v-spacer>

          <v-btn
            v-for="icon in icons"
            class="info mx-3"
            dark
            icon
            :key="icon.icono"
          >
            <v-icon size="36px" :src="icon.url">{{ icon.icono }}</v-icon>
          </v-btn>
        </v-card-title>

        <v-card-actions class="info justify-center">
          <strong>
            &copy;2021 —Aplicaciones Moviles - Tp2 - Maximiliano
            Colombatti</strong
          >
        </v-card-actions>
      </v-card>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  name: "App",

  data: () => ({
    icons: [
      {
        id: 1,
        icono: "mdi-facebook",
        url: "https://www.facebook.com"
      },
      {
        id: 2,
        icono: "mdi-twitter",
        url: "https://www.twitter.com"
      },
      {
        id: 3,
        icono: "mdi-instagram",
        url: "https://www.instagram.com"
      }
    ],
    items: [
      {
        titulo: "Home",
        icono: "home",
        path: "/"
      },
      {
        titulo: "Pedir Cursos",
        icono: "view-list",
        path: "/form"
      },
      {
        titulo: "Ver Cursos Pedidos",
        icono: "eye",
        path: "/ver"
      },
      {
        titulo: "Mis Tareas",
        icono: "file-check-outline",
        path: "/todo"
      }
    ],
    cursos: [],
    drawer: null,
    group: null
  })
};
</script>
<style>
h1 {
  color: azure;
}
a {
  text-decoration: none;
}

.v-image {
  min-height: 330px;
}
</style>
