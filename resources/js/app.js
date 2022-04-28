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
Vue.mixin({
    data: function () {
        return {
            get BaseUrl() {
                return document.getElementById('app_url').value;
            },
        }
    },
    methods: {
        showNotification(type, text) {
            var self = this;
            self.$toastr(type, '', text)
        },
        initializeSendBird: function () {
            var self = this;
            var prefix = getEnvironmentPrefix();
            sb.connect(prefix + user_id, function (user, error) {
                if (error) {
                    return;
                }

                sb.updateCurrentUserInfo(full_name, profile_url, function (response, error) {
                    if (error) {
                        return;
                    }
                });

            });
        },
        formatDate(timestamp) {
            return formatDate(timestamp);
        },
        formatTime(timestamp) {
            return formatTime(timestamp);
        },
        Ucfirst(str) {
            return ucfirst(str);
        },
        in_array(value, array) {
            return in_array(value, array);
        },
        getDate() {
            let today = new Date();
            return ('0' + today.getDate()).slice(-2) + '/'
                + ('0' + (today.getMonth() + 1)).slice(-2) + '/'
                + today.getFullYear();
        },
        getISODate() {
            const event = new Date();
            return event.toISOString();
        },
        isNotValid(value) {
            return value === "" || value === null;
        },
        getprofilePicture(profileImage) {
            if (profileImage === "" || profileImage === null) {
                return "https://assets.myonlinetherapy.com/images/default_user_profile.png";
            }
            return profileImage;
        },
        capitalize(s) {
            if (typeof s !== "string") return ""
            return s.charAt(0).toUpperCase() + s.slice(1)
        },
        redirectToHome() {
            window.location.href = "/therapy/dashboard";
        },
        redirect(url) {
            window.location.href  = url;
        },
        isVitality(source) {
            return source.toLowerCase() === 'vitality';
        },
        checkValidEmail(email){

            let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return (email !== "" && !emailReg.test(email));
        },
        assetUrl() {
            return "https://assets.myonlinetherapy.com/";
        },
        scrollToTop() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0
        },
        setDefaultBodyBackground() {
            document.body.style.background = "linear-gradient(181.73deg, #773CC2 -1.7%, #0E6BA4 8.42%, #1C7CB6 45.52%, #095F94 90.82%)";
        },
        getprofileLogo(profileImage) {
            if (profileImage === "" || profileImage === null) {
                return "/assets/images/client/logo/logo.png";
            }
            return profileImage;
        },
    }
});

window.app = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
    router,
    render: h => h(App)

});
