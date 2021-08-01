<template>
  <div>
    <h2>Mis Tareas Pendientes</h2>
    <v-container>
      <v-row>
        <v-col cols="12" md="9">
          <v-form v-on:submit.prevent>
            <v-row>
              <v-col cols="12" md="9">
                <v-text-field
                  label="Ingrese una tarea"
                  v-model="mensaje"
                ></v-text-field>
                <v-btn
                  type="submit"
                  class="btn pl-3 ml-3 mr-3 success"
                  @click="agregar"
                  >Agregar</v-btn
                >
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
    </v-container>
    <div>
      <v-banner :class="controlar ? 'classBien' : 'classError'"
        >El campo no debe quedar vacío. Debes ingresar una tarea</v-banner
      >
    </div>

    <ul>
      <li
        v-for="(pendiente, index) in listado"
        :key="index"
        :class="pendiente.css"
      >
        <v-btn class="todo" @click="toggle(index)"
          >{{ pendiente.mensaje }}
        </v-btn>

        <v-icon icon color="pink" @click="borrar(index)">mdi-delete</v-icon>
      </li>
    </ul>

    <p>Terminadas : {{ agregarFinalizadas }}</p>
  </div>
</template>
<script>
export default {
  name: "Mi-listado",
  data() {
    return {
      mensaje: "",
      listado: [],
      controlar: true,

      agregarFinalizadas: 0
    };
  },
  props: ["pendiente"],
  methods: {
    agregar: function() {
      if (this.mensaje == "") {
        this.controlar = false;
      } else {
        this.controlar = true;
        this.listado.push({
          mensaje: this.mensaje,
          css: "pendientes"
        });
        this.mensaje = "";
      }
    },

    toggle: function(index) {
      if (this.listado[index].css == "pendientes") {
        this.agregarFinalizadas++;
        this.listado[index].css = "terminadas";
      } else {
        this.agregarFinalizadas--;
        this.listado[index].css = "pendientes";
      }
    },
    borrar: function(index) {
      if (this.listado[index].css == "terminadas") {
        this.agregarFinalizadas--;
      }
      this.listado.splice(index, 1);
    }
  }
};
</script>
<style scoped>
ul {
  list-style: none;
}
ul li span {
  width: 400px;
  display: inline-block;
}
.classBien {
  visibility: hidden;
}
.classError {
  color: red;
}
input {
  width: 200px;
}
.pendientes {
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-bottom: 1rem;
  background: #fff;
  padding: 0.5rem;
  border-radius: 5px;
}
.terminadas {
  display: flex;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-bottom: 1rem;
  background: #fff;
  padding: 0.5rem;
  border-radius: 5px;
  opacity: 0.5;
}
.terminadas .todo {
  text-decoration: line-through !important;
}
</style>
