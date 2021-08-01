<template>
  <div>
    <div v-for="item in local" :key="item.fecha">
      <v-card>
        <v-list>
          <v-list-item>Titulo: {{ item.titulo }}</v-list-item>
          <v-list-item>Nombre: {{ item.nombre }}</v-list-item>
          <v-list-item>Apellido: {{ item.apellido }}</v-list-item>
          <v-list-item>Email: {{ item.email }}</v-list-item>
          <v-list-item>Comentario: {{ item.comentario }}</v-list-item>
          <v-list-item>
            <v-select :items="item.selected">
              <v-option :items="item.selected"></v-option
            ></v-select>
          </v-list-item>
        </v-list>
        <v-container>
          <v-row>
            <v-col cols="12" md="9"
              ><v-btn class="btn error  " @click="borrar(item)">borrar</v-btn>
              <v-btn class="btn pl-3 ml-3 mr-3  ">
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
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
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
      if (localStorage.datos) {
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
          var rta = confirm(
            "¿Está seguro que desea borrar " + this.local[i].titulo + " ?"
          );
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
