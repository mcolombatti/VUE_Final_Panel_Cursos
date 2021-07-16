<template>
  <v-form v-on:submit.prevent>
    <v-row>
      <v-col cols="12" md="9">
        <v-text-field label="titulo" required v-model="formIngresar.titulo"></v-text-field>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" md="9">
        <v-textarea label="comentario" required v-model="formIngresar.comentario"></v-textarea>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" md="9">
        <select v-model="formIngresar.selected" multiple require>
          <option value="1">Valor 1</option>
          <option value="2">Valor 2</option>
          <option value="3">Valor 3</option>
        </select>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" md="9">
        <v-btn @click="guardar(formIngresar)">Guardar</v-btn>
      </v-col>
    </v-row>
  </v-form>
</template>
<script>
export default {
  name: 'Form',

  data: () => ({
    formIngresar: {
      titulo: '',
      comentario: '',
      selected: [],
      fecha: ''
    },
    localArray: []
  }),
  methods: {
    guardar: function (formIngresar) {
      formIngresar = Object.assign({}, formIngresar, {
        fecha: new Date().getTime()
      })
      console.log(this.formIngresar)
      if (!localStorage.datos) {
        this.localArray = []
      } else {
        this.localArray = JSON.parse(localStorage.getItem('datos'))
      }
      this.localArray.push(formIngresar)
      localStorage.setItem('datos', JSON.stringify(this.localArray))
      this.$router.push('/ver')
    }
  }
}

</script>
