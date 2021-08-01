<template>
  <div>
    <v-card class=" pa-5" outlined tile>
      <v-responsive aspect-ratio="16:9" class="pa-4">
        <h2 class=" pb-3 text-center ">
          {{ item.nombre }}
        </h2>
        <v-img
          :src="'https://cursos-davinci.000webhostapp.com/api/' + item.imagen"
          :alt="item.imagen_descripcion"
        >
        </v-img>

        <carrito-cursos-agregar
          @agregar-curso="agregar(item)"
          :item="item"
          class="text-center pt-4"
        >
        </carrito-cursos-agregar>
      </v-responsive>
    </v-card>
  </div>
</template>
<script>
import carritoCursosAgregar from "./Carrito-Cursos-Agregar.vue";
export default {
  name: "Cursos-Item",
  components: {
    carritoCursosAgregar
  },
  props: ["item"],
  methods: {
    agregar(item) {
      this.$emit("actualizar-curso", item);
    }
  }
};
</script>
<style scoped>
h2 {
  color: #009688;
}
</style>
