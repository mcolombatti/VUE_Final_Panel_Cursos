  <template>
    <div>
      <div class="container-fluid m-5 text-center">
        <h2>Datos guardados</h2>
      </div>
      <v-list-item two-line v-for="item in local" :key="item.titulo">
        <v-list-item-content>
          <v-list-item-title>
            <h3 class="">Titulo del Curso Solicitado:</h3>
          </v-list-item-title>
          <v-list-item-subtitle>
            <p>{{ item.titulo }} </p>
          </v-list-item-subtitle>
          <v-list-item-title>
            <h3>Descripcion del Curso:</h3>
          </v-list-item-title>
          <v-list-item-subtitle>
            <p>{{item.comentario }} </p>
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <p>{{sin_datos}}</p>
    </div>
  </template>

<script>
export default {
  name: 'Mostrar',
  data: function () {
    return {
      local: [],
      sin_datos: ''
    }
  },
  mounted: function () {
    this.datos_local()
  },

  methods: {
    datos_local: function () {
      if (localStorage.datoform) {
        var datoLocal = JSON.parse(localStorage.getItem('datoform'))
        this.local = datoLocal
      } else {
        this.sin_datos =
              'No hay datos que mostrar, si querés pedirnos algun curso, completá nuestro formulario Pedido Nuevo Curso'
      }
    }
  }
}

</script>
