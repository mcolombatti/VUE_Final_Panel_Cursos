<template>
  <div>
    <v-card class="card-padding">
      <div>
        <div class="d-md-flex flex-row ">
          <div>
            <v-img
              :aspect-ratio="16 / 9"
              :width="width"
              :src="imagen"
              :alt="imagen_descripcion"
            >
            </v-img>
          </div>
          <div>
            <h2>{{ nombre }}</h2>
            <span class="">$ {{ precio }}</span>
            <rating />
            <p>Descripcion: {{ descripcion }}</p>
            <p>Fecha de Inicio del Curso: {{ fecha_inicio }}</p>
            <p>Profesor: {{ profesor }}</p>
            <v-btn class="info">
              <v-icon class="mdi mdi-arrow-left " @click="$router.go(-1)"
                >Volver</v-icon
              >
            </v-btn>
          </div>
        </div>
      </div>
    </v-card>
  </div>
</template>

<script>
import Rating from "../components/Rating";
export default {
  name: "DetalleCurso",
  components: {
    Rating
  },
  data: function() {
    return {
      width: 450,
      id: "",
      imagen: "",
      imagen_descripcion: "",
      nombre: "",
      precio: "",
      profesor: "",
      fecha_inicio: "",
      descripcion: ""
    };
  },

  mounted: function() {
    this.recuperarCursos();
  },
  methods: {
    recuperarCursos: function() {
      this.id = this.$route.params.id;
      this.nombre = this.$route.params.nombre;
      this.imagen = this.$route.params.imagen;
      this.imagen_descripcion = this.$route.params.imagen_descripcion;
      this.precio = this.$route.params.precio;
      this.profesor = this.$route.params.profesor;
      this.fecha_inicio = this.$route.params.fecha_inicio;
      this.descripcion = this.$route.params.descripcion;
      this.img = this.$route.params.img;
    }
  }
};
</script>
<style scoped>
.card-padding {
  padding: 2em;
}
.v-icon {
  font-size: 1rem;
}
</style>
