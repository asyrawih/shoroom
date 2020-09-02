
import store from "./store"

require('./bootstrap');

window.Vue = require('vue');

Vue.component('App', require('./App.vue').default);

const app = new Vue({
    el: '#app',
    store: store
});
