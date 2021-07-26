<template>
  <div>
    <v-card class=" pa-5" outlined tile>
      <v-responsive aspect-ratio="16:9" class="pa-4">
     
        <h2 class="  text-center ">
          {{ item.nombre }}
          
        </h2>
        
        <v-img :src="'https://cursos-davinci.000webhostapp.com/api/' + item.imagen" :alt="item.imagen_descripcion">
        </v-img>

        <carrito-cursos-agregar @agregar-curso="agregar(item)" :item="item" class="text-center pt-4">
        </carrito-cursos-agregar>
        <v-btn class="info">
        <div id="fav"> 
        <input type="checkbox" :checked="checkeado" @change="inputFav" :value="item.idcursos"
            :idcursos="item.idcursos" />
          <label :for="item.idcursos"> </label></div> </v-btn> 
      </v-responsive>
    </v-card>
  </div>
</template>
<script>
  import carritoCursosAgregar from "./Carrito-Cursos-Agregar.vue";
  export default {
    name: "Cursos-Item",
    components: {
      carritoCursosAgregar
    },
    props: ["item"],
    computed: {
      checkeado: function () {
        var cursosLocal = localStorage.getItem("favoritos");
        if (!cursosLocal) {
          cursosLocal = {}
        } else {
          cursosLocal = JSON.parse(cursosLocal)
        }
        return this.id in cursosLocal;


      }
    },
    methods: {
      inputFav(e) {
        let status = e.target.checked; 
        if (status == true) {
          this.agregarFav(this._props);
        } else {
          	this.quitarFavorito( this.id );
        }
      },
      agregarFav(data) { 
        var cursosLocal = localStorage.getItem("favoritos");
        if (!cursosLocal) {
          cursosLocal = {}
        } else {
          cursosLocal = JSON.parse(cursosLocal)
        }
        cursosLocal[data.id] = data;
        cursosLocal = JSON.stringify(cursosLocal);
        localStorage.setItem("favoritos", cursosLocal);
      },
      quitarFavorito( curso ){  
			
			var cursosLocal = localStorage.getItem( 'favoritos' ); 				
			
			cursosLocal = JSON.parse( cursosLocal ); 
			
			if( curso in cursosLocal ){
				
				delete cursosLocal[ curso ]; 
			}

			cursosLocal = JSON.stringify( cursosLocal ); 
			localStorage.setItem( 'favoritos', cursosLocal ); 
		},
      agregar(item) {
        this.$emit("actualizar-curso", item);
      }
    }
  };

</script>
<style >
  h2 {
    color: #009688 ;
  }
  
input[type="checkbox"]:checked + label {
    background:url(../../public/like.svg) center center no-repeat;
	width:25px;
    height:25px;
    width:132px;
	padding-left:30px;
} 
label{display:inline-block;padding:20px; width:200px;}
 
input[type="checkbox"] {
    position: absolute;
    overflow: hidden;
    left: -200px;
    width: 300px;
    display: inline-block;
    height: 25px;
}

input[type="checkbox"] +  label {
    display:inline-block;
    width:132px;
    height:25px;
	padding-left:30px;
	background:url(../../public/heart.svg) center center no-repeat;
    cursor:pointer;padding-bottom:0;
} #fav {
    position: relative;
    display: inline-block;
}
</style>
