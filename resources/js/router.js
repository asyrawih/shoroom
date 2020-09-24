import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home/index.vue';
import BarcodePages from "./pages/Barcode/index.vue"
const router = new VueRouter({
    mode : history, 
    routes: [
        {
            path: '/',
            name: 'root',
            component: Home,
        },
        {
            path: '/barcode',
            name: 'barcode',
            component: BarcodePages
        }
    ]
})

export default router;