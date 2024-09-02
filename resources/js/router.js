import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Pages/Home.vue"),
    },
    {
        path: "/pocisiones",
        component: () => import("./Pages/PositionsPage.vue"),
    },    
    {
        path: "/usuarios",
        component: () => import("./Pages/UsersPage.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
