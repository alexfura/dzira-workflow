import Vue from 'vue';
import VueRouter from "vue-router";
import board from "./board";
import login from "./login";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        login,
        board
    ]
});
//
// router.beforeEach((to, from, next) => {
//     if (to.name !== 'Login' && !isAuthenticated) next({ name: 'Login' })
//     else next()
// });

export default router;