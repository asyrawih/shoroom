
import store from "./store"
import VueToast from 'vue-toast-notification';
import Vue from 'vue';

// Import one of available themes
import 'vue-toast-notification/dist/theme-default.css';

require('./bootstrap');
window.Vue = Vue;

Vue.use(VueToast);


Vue.component('App', require('./App.vue').default);

const app = new Vue({
    el: '#app',
    store: store
});
