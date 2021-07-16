<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 borde pb-3">
        <div class="col-md-8 borde pb-3">
          <h3>Pedido de Nuevos Cursos</h3>
          <v-form v-on:submit.prevent="enviar" novalidate>
            <v-row>
              <v-col cols="12" md="9">
                <v-text-field label="nombre" id="nombre"> </v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <v-text-field label="apellido" id="nombre1"> </v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <v-text-field
                  v-model="email"
                  id="mail"
                  aria-describedby="ayudamail"
                  label="E-mail"
                  required
                >
                </v-text-field>
                <small id="ayudamail" class="form-text text-muted"
                  >Tu dirección de email está segura con nosotros.</small
                >
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <v-text-field
                  class="form-control"
                  v-model="titulo"
                  label="Ingrese Titulo"
                  name="titulo"
                  required
                >
                </v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <v-textarea
                  name="comentario"
                  label="descripcion del curso."
                  v-model="comentario"
                ></v-textarea>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="9">
                <select
                  v-model="seleccion"
                  multiple
                  size="2"
                  name="seleccion"
                  class="form-control"
                >
                  <option>Programacion</option>
                  <option>Maquetado</option>
                  <option>UX</option>
                  <option>Servidores</option>
                  <option>Otro</option>
                </select>
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
                  >Enviar</v-btn
                >
              </v-col>
            </v-row>
          </v-form>
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
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Ingresar",
  data: function() {
    return {
      titulo: null,
      comentario: "",
      seleccion: [],
      email: null,
      arr: [],
      errores: [],
      submitted: false,
      verificar: true
    };
  },
  computed: {
    hayErrores: function() {
      return this.errores.length; // Devuelve cantidad errores
    }
  },
  methods: {
    enviar: function(event) {
      this.submitted = true;
      this.errores = [];

      if (!this.titulo) {
        console.log(!this.titulo);
        this.errores.push("El titulo es obligatorio.");
        this.verificar = false;
      }
      if (!this.email) {
        console.log(!this.email);
        this.errores.push("La direccion de email obligatoria.");
      }
      if (this.titulo && this.titulo.length < 3) {
        this.errores.push("Debe tener mas de 3 caracteres.");
      }
      if (!this.seleccion[0]) {
        this.errores.push("Debe seleccionar un elemento.");
      }

      if (this.errores.length === 0) {
        this.cursoNuevo = {
          comentario: this.comentario,
          titulo: this.titulo,
          seleccion: this.seleccion,
          anio: this.anio
        };
        if (!localStorage.datoform) {
          this.arr = [];
        } else {
          this.arr = JSON.parse(localStorage.getItem("datoform"));
        }
        this.arr.push(this.cursoNuevo);
        localStorage.setItem("datoform", JSON.stringify(this.arr));
        this.$router.push("/mostrar");
      }
    },
    mounted: function() {
      this.arr = JSON.parse(localStorage.getItem("datoform")) || [];
    }
  }
};
</script>

<style scoped>
.enviado {
  color: green;
}

.classError {
  color: red;
}
</style>
