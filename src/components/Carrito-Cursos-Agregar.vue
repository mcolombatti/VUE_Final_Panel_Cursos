<template>
  <div>
    <v-btn class="primary" @click="agregar">Agregar Curso</v-btn>
  </div>
</template>
<script>
export default {
  name: "Carrito-Cursos-Agregar",

  methods: {
    agregar(e) {
      console.log(e);
      this.$emit("agregar-curso");
    }
  }
};
</script>
