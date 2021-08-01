<template>
  <v-btn class="btn pl-3 ml-3 mr-3 warning " @click="vaciar"
    >Vaciar Cursos en Carrito</v-btn
  >
</template>
<script>
export default {
  name: "Vaciar-Carrito-Cursos",

  methods: {
    vaciar() {
      this.$emit("vaciar-cursos");
    }
  }
};
</script>
<style scoped></style>
