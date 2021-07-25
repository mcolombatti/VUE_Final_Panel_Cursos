<template>
  <div>
    <div v-for="item in local" :key="item.fecha">
      <v-card>
        <v-card-title>{{ item.titulo }}</v-card-title>
        <v-card-title>{{ item.nombre }}</v-card-title>
        <v-card-title>{{ item.apellido }}</v-card-title>
        <v-card-title>{{ item.email }}</v-card-title>
        <v-card-text>{{ item.comentario }}</v-card-text>
        <v-select :items="item.selected" :selected="item.selected"> </v-select>
      </v-card>
      <v-card>
        <router-link
          :to="
            '/editar/' +
              item.titulo +
              '/' +
              item.nombre +
              '/' +
              item.apellido +
              '/' +
              item.email +
              '/' +
              item.comentario +
              '/' +
              item.selected +
              '/' +
              item.fecha
          "
        >
          editar</router-link
        >
      </v-card>
      <v-card>
        <v-btn @click="borrar(item)">borrar</v-btn>
      </v-card>
    </div>
  </div>
</template>
<script>
export default {
  name: "Ver",

  data: () => ({
    local: [],
    sinData: ""
  }),
  mounted: function() {
    this.verDatosLocal();
  },
  methods: {
    verDatosLocal: function() {
      if (localStorage.dato) {
        var obtenerDatos = JSON.parse(localStorage.getItem("datos"));
        this.local = obtenerDatos;
      }
      if (this.local.length === 0) {
        this.sinData = "debes completar informacion antes para visualizarla";
      }
    },
    borrar: function(item) {
      this.local = JSON.parse(localStorage.getItem("datos"));
      for (let i = 0; i < this.local.length; i++) {
        if (this.local[i].fecha === item.fecha) {
          var rta = confirm("queres borrar" + this.local[i].titulo);
          if (rta === true) {
            this.local.splice(i, 1);
          }
        }
      }
      localStorage.setItem("datos", JSON.stringify(this.local));
      this.verDatosLocal();
    }
  }
};
</script>
