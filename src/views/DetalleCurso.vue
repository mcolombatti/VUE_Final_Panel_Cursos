<template>
  <div>
    <v-container class="align-center card-padding">
      <v-row>
        <v-col cols="12" md="3">
          <v-img
            :aspect-ratio="16 / 9"
            :width="width"
            :src="imagen"
            :alt="imagen_descripcion"
          >
          </v-img>
        </v-col>
        <v-col cols="12" md="9">
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
        </v-col>
      </v-row>
    </v-container>
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
