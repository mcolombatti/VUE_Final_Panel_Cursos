import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home
  },
  {
    path: "/mostrar",
    name: "Mostrar",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Mostrar.vue")
  },
  {
    path: "/ingresar",
    name: "ingresar",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/Ingresar.vue")
  },
  {
    path:
      "/cursos/:id/:nombre/:imagen/:imagen_descripcion/:precio/:descripcion/:profesor/:fecha_inicio",
    name: "DetalleCurso",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/DetalleCurso.vue")
  },
  {
    path: "/form",
    name: "Form",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ "../views/Form.vue")
  },
  {
    path: "/ver",
    name: "Ver",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ "../views/Ver.vue")
  },
  {
    path: "/editar/:titulo/:comentario/:selected/:fecha",
    name: "EditarV",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/EditarV.vue")
  }
];

const router = new VueRouter({
  routes
});

export default router;
