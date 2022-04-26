<template>
    <!-- Navbar 3 Level (Light)-->
    <header class="shadow-sm">
        <SignInSignUpModel
            @closeDialog="closeSignInSignUpModel"
            @setUserName="setUserName"
            :key="this.key"
        ></SignInSignUpModel>
        <!-- Topbar-->
        <div class="topbar topbar-dark bg-dark">
            <div class="container">
                <div class="topbar-text dropdown d-md-none"><a class="topbar-link dropdown-toggle" href="#"
                                                               data-bs-toggle="dropdown">Useful links</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="tel:00331697720"><i class="fas fa-camera"></i>(00) 33 169
                            7720</a></li>
                        <li><a class="dropdown-item" href="order-tracking.html"><i
                            class="ci-location text-muted me-2"></i>Order tracking</a></li>
                    </ul>
                </div>
                <div class="topbar-text text-nowrap d-none d-md-inline-block"><i class="ci-support"></i><span
                    class="fa fa-home active">Support</span><a class="topbar-link" href="tel:00331697720">(00) 33 169
                    7720</a></div>
                <div class="tns-carousel tns-controls-static d-none d-md-block">
                    <div class="tns-carousel-inner"
                         data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false}">
                        <div class="topbar-text">Free shipping for order over $200</div>
                        <div class="topbar-text">We return money within 30 days</div>
                        <div class="topbar-text">Friendly 24/7 customer support</div>
                    </div>
                </div>
                <div class="ms-3 text-nowrap"><a class="topbar-link me-4 d-none d-md-inline-block"
                                                 href="order-tracking.html"><i class="ci-location"></i>Order
                    tracking</a>
                    <div class="topbar-text dropdown disable-autohide"><a class="topbar-link dropdown-toggle" href="#"
                                                                          data-bs-toggle="dropdown"><img class="me-2"
                                                                                                         src="img/flags/en.png"
                                                                                                         width="20"
                                                                                                         alt="English">Eng
                        / $</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li class="dropdown-item">
                                <select class="form-select form-select-sm">
                                    <option value="usd">$ USD</option>
                                    <option value="eur">€ EUR</option>
                                    <option value="ukp">£ UKP</option>
                                    <option value="jpy">¥ JPY</option>
                                </select>
                            </li>
                            <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="img/flags/fr.png"
                                                                            width="20" alt="Français">Français</a></li>
                            <li><a class="dropdown-item pb-1" href="#"><img class="me-2" src="img/flags/de.png"
                                                                            width="20" alt="Deutsch">Deutsch</a></li>
                            <li><a class="dropdown-item" href="#"><img class="me-2" src="img/flags/it.png" width="20"
                                                                       alt="Italiano">Italiano</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
        <div class="navbar-sticky bg-light">
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="index.html"><img
                    src="img/logo-dark.png" width="142" alt="Cartzilla"></a><a
                    class="navbar-brand d-sm-none flex-shrink-0 me-2" href="index.html"><img src="img/logo-icon.png"
                                                                                             width="74" alt="Cartzilla"></a> -->
                    <div class="input-group d-none d-lg-flex mx-4">
                        <input @keyup.enter="search($event)" class="form-control rounded-end pe-5" type="text" placeholder="Search for products"><i
                        class="ci-search position-absolute top-50 end-0 translate-middle-y text-muted fs-base me-3"></i>
                    </div>
                    <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
                        <a class="navbar-tool navbar-stuck-toggler" href="#"><span class="navbar-tool-tooltip">Expand menu</span>
                            <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                        </a><a class="navbar-tool d-none d-lg-flex" href="account-wishlist.html"><span
                        class="navbar-tool-tooltip">Wishlist</span>
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-heart"></i></div>
                    </a><a  class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="#signin-modal" data-bs-toggle="modal">
                        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                        <div class="navbar-tool-text ms-n3"><small>Hello, {{ $store.state.userName == '' || $store.state.userName == 'undefined' || $store.state.userName == null ? 'Sign in' : $store.state.userName}}</small>My Account</div>
                    </a>
                        <mini-cart></mini-cart>
                    </div>
                </div>
            </div>
            <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <!-- Search-->
                        <div class="input-group d-lg-none my-3"><i
                            class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                            <input class="form-control rounded-start" type="text" placeholder="Search for products">
                        </div>
                        <!-- Departments menu-->
                        <departments :departments="departments">

                        </departments>
                        <!-- Primary menu-->
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown active"><router-link :to="{name: '/', params:{}}" class="nav-link dropdown-toggle" href="#"
                                                                    data-bs-toggle="dropdown">Home</router-link>
                            </li>
                            <li class="nav-item dropdown"><router-link :to="{name: 'Shop', params:{}}" class="nav-link dropdown-toggle"
                                                             >Shop</router-link>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#"
                                                             data-bs-toggle="dropdown">Account</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#"
                                                            data-bs-toggle="dropdown">Shop User Account</a>
                                        <ul class="dropdown-menu">
                                            <li><router-link class="dropdown-item" :to="{name: 'account-orders', params:{}}" >Orders History</router-link>
                                            </li>
                                            <li><router-link class="dropdown-item" :to="{name: 'account-profile', params:{}}">Profile
                                                Settings</router-link></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="account-signin.html">Sign In / Sign Up</a></li>
                                    <li><a class="dropdown-item" href="account-password-recovery.html">Password
                                        Recovery</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import MiniCart from "../CartDetails/miniCart";
import SignInSignUpModel from "../Account/SignIn-SignUpModel";
import Departments from "../Departments/Departments";

export default {
    name: "NavBar",
    components: {Departments, SignInSignUpModel, MiniCart},
    data() {
        return {
            isUserLoggedIn: '',
            userName: '',
            closeDialog: true,
            key:'',
            departments:[],
            products:[]
        }
    },
    created() {
        this.userName = this.$store.state.userName;
        this.getDepartments();
    },
    methods: {
        setUserName(userName) {
            this.userName = userName;
        },
        closeSignInSignUpModel() {
           this.$router.go();
        },
        getDepartments() {
            let loader = this.$loading.show();
            axios.get('http://127.0.0.1:8999/api/departments', {}).then(response => {
                loader.hide();
                this.departments = response.data.data;
            }).catch(error => {
                loader.hide();
                this.$toast.error('oops an error occurred');
            });
        },
        search (event) {
            this.$router.push({ path: 'shop', query: { search: event.target.value }});
        }
    },

    watch: {}
}
</script>

<style scoped>

</style>
