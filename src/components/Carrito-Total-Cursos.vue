<template>
  <div>

    <p>Cantidad: {{this.carritoCurso.length}} juegos</p>
        <p>Total: ${{this.total}}</p>
       <vaciar-carrito-cursos @vaciar-cursos="actualizarCarritoVacio" >
        </vaciar-carrito-cursos> 
  </div>
</template>
<script>
 import VaciarCarritoCursos from './Vaciar-Carrito-Cursos.vue';
  export default {
  name: 'Carrito-Total-Cursos',
    components: {
     VaciarCarritoCursos
    },
    data() {
      return {}
    },
   props: ['carritoCurso', 'total'],
   methods: {
      actualizarCarritoVacio() {
        this.$emit('carrito-cursos-vacio')
      } 
    }
  }

</script>
<style scoped>
 
</style>
