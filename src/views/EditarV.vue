<template>
  <div>
    <v-text-field
      label="titulo"
      required
      v-model="nuevoObjeto.titulo"
    ></v-text-field>
    <v-text-field
      label="nombre"
      required
      v-model="nuevoObjeto.nombre"
    ></v-text-field>
    <v-text-field
      label="apellido"
      required
      v-model="nuevoObjeto.apellido"
    ></v-text-field
    ><v-text-field
      label="email"
      required
      v-model="nuevoObjeto.email"
    ></v-text-field
    ><v-text-field
      label="comentario"
      required
      v-model="nuevoObjeto.comentario"
    ></v-text-field
    ><v-text-field
      label="seleccion"
      required
      v-model="nuevoObjeto.selected"
    ></v-text-field>
    <v-icon class="mdi mdi-arrow-left " @click="$router.go(-1)">Volver</v-icon>
    <v-row>
      <v-col cols="12" md="9">
        <v-btn @click="editar(nuevoObjeto)">Editar</v-btn>
      </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
  name: "Editar",

  data: function() {
    return {
      titulo: "",
      comentario: "",
      selected: [],
      fecha: "",
      nuevoObjeto: {
        titulo: this.$route.params.titulo,
        nombre: this.$route.params.nombre,
        apellido: this.$route.params.apellido,
        email: this.$route.params.email,
        comentario: this.$route.params.comentario,
        selected: this.$route.params.selected.split(","),
        fecha: this.$route.params.fecha
      }
    };
  },

  mounted: function() {
    this.mostrar();
  },
  methods: {
    editar: function() {
      this.local = JSON.parse(localStorage.getItem("datos"));

      for (var i = 0; i < this.local.length; i++) {
        console.log(`this.nuevoObjeto.fecha: ${this.nuevoObjeto.fecha}`);
        console.log(`this.local[i].fecha: ${this.local[i].fecha}`);
        /* eslint-disable */
        if (this.local[i].fecha == this.nuevoObjeto.fecha) {
          this.local.splice(i, 1)[0];
        }
        /* eslint-enable */
      }
      this.local.push(this.nuevoObjeto);
      localStorage.setItem("datos", JSON.stringify(this.local));
      this.$router.push("/ver");
    },
    mostrar: function() {
      this.local = JSON.parse(localStorage.getItem("datos"));
    }
  }
};
</script>
