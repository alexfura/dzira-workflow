import Vue from 'vue';
import VueRouter from "vue-router";
import board from "./board";

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        board
    ]
});