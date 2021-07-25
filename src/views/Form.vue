<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 borde pb-3">
        <div class="col-md-8 borde pb-3">
          <h3>Pedido de Nuevos Cursos</h3>
          <v-form v-on:submit.prevent>
            <v-row>
              <v-col cols="12" md="9">
                <v-text-field
                  label="Nombre"
                  required
                  v-model="formIngresar.nombre"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <v-text-field
                  label="apellido"
                  required
                  v-model="formIngresar.apellido"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <v-text-field
                  label="titulo"
                  required
                  v-model="formIngresar.titulo"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <v-textarea
                  label="comentario"
                  required
                  v-model="formIngresar.comentario"
                ></v-textarea>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <v-select
                  :items="items"
                  v-model="formIngresar.selected"
                  label="Solo field"
                  multiple
                ></v-select>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <v-btn type="reset" value="limpiar" class="btn warning"
                  >Limpiar</v-btn
                >

                <v-btn
                  type="submit"
                  class="btn pl-3 ml-3 mr-3 success"
                  value="Enviar"
                  @click="guardar(formIngresar)"
                  >Guardar</v-btn
                >
              </v-col>
            </v-row>
            <div class="d-flex m-3" v-if="submitted === true">
              <div
                v-if="hayErrores"
                :class="verificar ? 'enviado' : 'classError'"
              >
                <ul>
                  <li v-for="x in errores" :key="x.errores">{{ x }}</li>
                </ul>
              </div>
              <div v-else class="enviado">
                <span>Enviado con éxito</span>
              </div>
            </div>
          </v-form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Form",

  data: () => ({
    formIngresar: {
      titulo: "",
      comentario: "",
      apellido: "",
      nombre: "",
      selected: [],
      fecha: ""
    },
    items: ["Maquetado", "Programación", "Base de Datos", "Frameworks"],
    localArray: [],
    errores: [],
    submitted: false,
    verificar: true
  }),
  computed: {
    hayErrores: function() {
      return this.errores.length; // Devuelve cantidad errores
    }
  },
  methods: {
    guardar: function(formIngresar) {
      this.submitted = true;
      this.errores = [];

      if (!this.formIngresar.titulo) {
        this.errores.push("El titulo es obligatorio.");
        this.verificar = false;
      }
      if (!this.formIngresar.nombre) {
        this.errores.push("El nombre es obligatorio.");
        this.verificar = false;
      }
      if (!this.formIngresar.apellido) {
        this.errores.push("El apellido es obligatorio.");
        this.verificar = false;
      }
      if (!this.formIngresar.comentario) {
        this.errores.push("el comentario es obligatorio.");
      }
      if (this.formIngresar.titulo && this.formIngresar.titulo.length < 3) {
        this.errores.push("Debe tener mas de 3 caracteres.");
      }
      if (this.formIngresar.nombre && this.formIngresar.nombre.length < 3) {
        this.errores.push("Debe tener mas de 3 caracteres.");
      }
      if (this.formIngresar.apellido && this.formIngresar.apellido.length < 3) {
        this.errores.push("Debe tener mas de 3 caracteres.");
      }
      if (!this.formIngresar.selected[0]) {
        this.errores.push("Debe seleccionar un elemento.");
      }

      formIngresar = Object.assign({}, formIngresar, {
        fecha: new Date().getTime()
      });
      console.log(this.formIngresar);

      if (this.errores.length === 0) {
        if (!localStorage.datos) {
          this.localArray = [];
        } else {
          this.localArray = JSON.parse(localStorage.getItem("datos"));
        }
        this.localArray.push(formIngresar);
        localStorage.setItem("datos", JSON.stringify(this.localArray));
        this.$router.push("/ver");
      }
    }
  }
};
</script>
