<template
  ><div class="pt-3 pb-3">
    <v-menu offset-y>
      <template v-slot:activator="{ on, attrs }">
        <v-btn color="primary" dark v-bind="attrs" v-on="on">
          Mis Cursos
        </v-btn>
      </template>

      <v-list>
        <v-list-item
          >Cantidad: {{ this.carritoCurso.length }} Cursos</v-list-item
        >
        <v-list-item>Total: ${{ this.total }}</v-list-item>
        <v-container>
          <v-row>
            <v-col cols="12" md="9">
              <vaciar-carrito-cursos @vaciar-cursos="actualizarCarritoVacio">
              </vaciar-carrito-cursos>
            </v-col>
          </v-row>
        </v-container>
      </v-list>
    </v-menu>
  </div>
</template>
<script>
import VaciarCarritoCursos from "./Vaciar-Carrito-Cursos.vue";
export default {
  name: "Carrito-Total-Cursos",
  components: {
    VaciarCarritoCursos
  },
  data() {
    return {};
  },
  props: ["carritoCurso", "total"],
  methods: {
    actualizarCarritoVacio() {
      this.$emit("carrito-cursos-vacio");
    }
  }
};
</script>
<style scoped></style>
