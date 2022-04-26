require('./bootstrap');
import Vue from 'vue'
import App from './views/App.vue';
import VueRouter from 'vue-router';
import store from './store.js';
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';

import VueToast from 'vue-toast-notification';
// Import one of the available themes
// import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';

import router from "./Router";

Vue.use(VueRouter);
Vue.use(VueLoading);
Vue.use(VueToast, {
    position: 'top-right',
    type: 'success',
    duration: 2000,
    dismissible: true
});

window.app = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
    router,
    render: h => h(App)

});
