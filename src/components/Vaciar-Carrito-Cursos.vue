<template>
  <div>

<v-btn @click="vaciar">Vaciar Cursos en Carrito</v-btn>
  </div>
</template>
<script>
  export default {
    name: 'Vaciar-Carrito-Cursos',
 
    methods: {
      vaciar() {
        this.$emit('vaciar-cursos')
      }
    }
  }

</script>
<style scoped>
 
</style>
