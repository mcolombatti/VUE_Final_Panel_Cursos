<template>
  <div>
    <section>
      <carrito-total-cursos
        :carritoCurso="this.carritoCurso"
        :total="this.total"
        @carrito-cursos-vacio="vaciar"
      >
      </carrito-total-cursos>
    </section>

    <v-data-iterator
      :items="items"
      :items-per-page.sync="itemsPerPage"
      :page.sync="page"
      :search="search"
      :sort-by="sortBy.toLowerCase()"
      :sort-desc="sortDesc"
      hide-default-footer
    >
      <template v-slot:header>
        <v-text-field
          v-model="search"
          clearable
          flat
          solo-inverted
          hide-details
          prepend-inner-icon="mdi-magnify"
          label="Buscar"
        >
        </v-text-field>

        <v-select
          v-model="sortBy"
          flat
          solo-inverted
          hide-details
          prepend-inner-icon="mdi-magnify"
          label="Ordenar por"
          :items="keys"
        >
        </v-select>

        <v-btn-toggle v-model="sortDesc">
          <v-btn large depressed color="blue" :value="false">
            <v-icon>mdi-arrow-up</v-icon>
          </v-btn>
          <v-btn large depressed color="blue" :value="true">
            <v-icon>mdi-arrow-down</v-icon>
          </v-btn>
        </v-btn-toggle>
      </template>
      <template v-slot:default="props">
        <v-row justify="space-around">
          <v-col v-for="item in props.items" :key="item.id">
            <v-card>
              <v-card-title
                class="justify-space-around subheading font-weight-bold"
              >
                <cursos-item
                  :item="item"
                  :key="item.id"
                  @actualizar-curso="actualizar"
                />
              </v-card-title>

              <v-divider></v-divider>
              <v-list>
                <v-list-item v-for="(key, index) in filteredKeys" :key="index">
                  <v-list-item-content
                    :class="{ 'blue--text': sortBy === key }"
                  >
                    {{ key }}:
                  </v-list-item-content>
                  <v-list-item-content
                    class="align-end"
                    :class="{ 'orange--text': sortBy === key }"
                  >
                    {{ item[key.toLowerCase()] }}
                  </v-list-item-content>
                </v-list-item>
                <v-list-item>
                  <v-btn>
                    <router-link
                      :to="
                        '/cursos/' +
                          item.id +
                          '/' +
                          item.nombre +
                          '/' +
                          item.imagen +
                          '/' +
                          item.imagen_descripcion +
                          '/' +
                          item.precio +
                          '/' +
                          item.descripcion +
                          '/' +
                          item.profesor +
                          '/' +
                          item.fecha_inicio
                      "
                    >
                      Ver más detalles del Curso
                    </router-link>
                  </v-btn></v-list-item
                >
              </v-list>
            </v-card>
          </v-col>
        </v-row>
      </template>
      <template v-slot:footer>
        <v-row class="mt-2" align="center" justify="center">
          <span class="grey--text">Items por pagina</span>
          <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                dark
                text
                color="primary"
                class="ml-2"
                v-bind="attrs"
                v-on="on"
              >
                {{ itemsPerPage }}
                <v-icon>mdi-chevron-down</v-icon>
              </v-btn>
            </template>
            <v-list>
              <v-list-item
                v-for="(number, index) in itemsPerPageArray"
                :key="index"
                @click="updateItemsPerPage(number)"
              >
                <v-list-item-title>{{ number }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>

          <v-spacer></v-spacer>

          <span
            class="mr-4
            grey--text"
          >
            Página {{ page }} de {{ numberOfPages }}
          </span>
          <v-btn
            fab
            dark
            color="blue darken-3"
            class="mr-1"
            @click="formerPage"
          >
            <v-icon>mdi-chevron-left</v-icon>
          </v-btn>
          <v-btn fab dark color="blue darken-3" class="ml-1" @click="nextPage">
            <v-icon>mdi-chevron-right</v-icon>
          </v-btn>
        </v-row>
      </template>
    </v-data-iterator>
  </div>
</template>

<script>
import CursosItem from "../components/Cursos-Item.vue";
import CarritoTotalCursos from "../components/Carrito-Total-Cursos.vue";

export default {
  name: "Home",

  components: {
    CursosItem,
    CarritoTotalCursos
  },
  data() {
    return {
      local: [],
      items: [],
      carritoCurso: [],
      total: 0,
      itemsPerPageArray: [3, 4, 6],
      search: "",
      filter: {},
      sortDesc: false,
      page: 1,
      itemsPerPage: 3,
      sortBy: "Nombre",
      keys: ["Nombre", "Descripcion", "Precio", "Fecha_Inicio"]
    };
  },
  computed: {
    //cursos por página a mostrar
    numberOfPages() {
      return Math.ceil(this.items.length / this.itemsPerPage);
    },
    //filtro para el select de los key
    filteredKeys() {
      return this.keys.filter(key => key !== "Nombre");
    },

    shoppingcarritoCursoTotal() {
      return this.carritoCurso
        .map(item => item.precio)
        .reduce((total, amount) => parseFloat(total) + parseFloat(amount));
    }
  },
  methods: {
    //configuracion del paginador
    nextPage() {
      if (this.page + 1 <= this.numberOfPages) this.page += 1;
    },
    formerPage() {
      if (this.page - 1 >= 1) this.page -= 1;
    },
    updateItemsPerPage(number) {
      this.itemsPerPage = number;
    },

    actualizar(e) {
      this.carritoCurso.push(e);

      this.total = this.shoppingcarritoCursoTotal;
    },
    vaciar() {
      this.carritoCurso = [];
      this.total = 0;
    }
  },
  mounted() {
    fetch("https://cursos-davinci.000webhostapp.com/api/todos.php")
      .then(response => response.json())
      .then(response => {
        this.items = response;

        localStorage.setItem("dato", JSON.stringify(this.items));
      })
      .catch(err => console.error(err));
  }
};
</script>
