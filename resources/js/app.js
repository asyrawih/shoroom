
import store from "./store"
import VueToast from 'vue-toast-notification';
import Vue from 'vue';
import route from './router'
// Import one of available themes
import 'vue-toast-notification/dist/theme-default.css';

require('./bootstrap');
window.Vue = Vue;

Vue.use(VueToast);

const app = new Vue({
    el: '#app',
    store: store,
    router : route
});
