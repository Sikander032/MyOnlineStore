<template>
    <!-- Sign in / sign up modal-->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <ul v-if="$store.state.userId == null" class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link fw-medium active" id="signin-tab-1" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Sign In</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" id="signup-tab-2" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign Up</a></li>
                    </ul>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div  v-if="$store.state.userId == null" class="modal-body tab-content py-4">
                    <form @submit.prevent="signIn"  class="needs-validation tab-pane fade active show" autocomplete="off" novalidate id="signin-tab">
                        <div class="mb-3">
                            <label class="form-label" for="si-email">Email address</label>
                            <input class="form-control" v-model="login_email" type="email" id="si-email" placeholder="johndoe@example.com" required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="si-password" >Password</label>
                            <div class="password-toggle">
                                <input class="form-control" v-model="login_password" type="password" id="si-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 d-flex flex-wrap justify-content-between">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="si-remember">
                                <label class="form-check-label" for="si-remember">Remember me</label>
                            </div><a class="fs-sm" href="#">Forgot password?</a>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100">Sign in</button>
                    </form>
                    <form @submit.prevent="signUp" class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
                        <div class="mb-3">
                            <label class="form-label" for="su-name">Full name</label>
                            <input class="form-control" v-model="full_name" type="text" id="su-name" placeholder="John Doe" required>
                            <div class="invalid-feedback">Please fill in your name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="su-email">Email address</label>
                            <input class="form-control" type="email" id="su-email" v-model="email_address" placeholder="johndoe@example.com" required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="su-password">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" v-model="password" type="password" id="su-password" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  for="su-password-confirm">Confirm password</label>
                            <div class="password-toggle">
                                <input class="form-control" v-model="confirm_password" type="password" id="su-password-confirm" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-shadow d-block w-100">Sign up</button>
                    </form>

                </div>
                <div v-else class="modal-body tab-content py-4" >
                    <a class="btn btn-primary btn-sm d-none d-lg-inline-block text-center" @click="signOut"><i
                        class="ci-sign-out me-2"></i>Sign out</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SignIn-SignUpModel.vue",
    created() {
        // this.getLoggedInUser();
    },
    data() {
        return {
            full_name:'',
            email_address:'',
            password:'',
            confirm_password:'',
            login_email: '',
            login_password: ''
        }
    },
    methods: {
        signUp() {
            if(this.isNotEmpty(this.full_name) &&this.isNotEmpty(this.email_address) &&
                this.isNotEmpty(this.password) && this.isNotEmpty(this.confirm_password))
            {
                let loader = this.$loading.show();
                axios.post('http://127.0.0.1:8999/api/user/sign-up', {
                    full_name: this.full_name,
                    email_address: this.email_address,
                    password: this.password,
                    confirm_password: this.confirm_password
                }).then(response => {
                    loader.hide();
                    if (response.data.redirect_to_login == true) {
                        this.$toast.success('A User already exists with this Email Address. Please Log In.');
                        var signInNav = document.getElementById("signin-tab-1");
                        signInNav.classList.add("active");
                        var signUpNav = document.getElementById("signup-tab-2");
                        signUpNav.classList.remove("active");
                        var signUpTab = document.getElementById("signin-tab");
                        signUpTab.classList.add("active");
                        var signUpTab = document.getElementById("signin-tab");
                        signUpTab.classList.add("show");
                        var signUpTab = document.getElementById("signup-tab");
                        signUpTab.classList.remove("active");
                    } else {
                        this.$store.commit('saveUserName', response.data.user.name);
                        this.$toast.success('Welcome ' + response.data.user.name);
                        this.$store.commit('storeUserTokenAndId', response.data.user);
                        this.$emit('closeDialog');
                    }
                }).catch(error => {
                    loader.hide();
                    this.$toast.error('oops an error occurred');
                });
            }
        },

        signIn() {
            if(this.isNotEmpty(this.email) &&
                this.isNotEmpty(this.password))
            {
                axios.post('http://127.0.0.1:8999/api/user/sign-in', {
                    // api_token: this.$store.state.apiToken,
                    email: this.login_email,
                    password: this.login_password
                }).then(response => {
                    this.$store.commit('saveUserName', response.data.user.name);
                    this.$toast.success('Welcome ' + response.data.user.name);
                    this.$store.commit('storeUserTokenAndId', response.data.user);
                    this.$emit('closeDialog');
                }).catch(error => {
                    this.$toast.error('oops an error occurred.Retry with correct credentials');
                });
            }
        },

        getLoggedInUser () {
            axios.get('http://127.0.0.1:8999/api/user', {
                headers: {
                    'X-Authorization': self.api_token
                },
                params: {
                    api_token: this.$store.state.apiToken,
                }
            }).then(response => {
                this.products = response.data.products;
            })["catch"](function (error) {
                console.log(error);
            });
        },
        signOut() {
            window.localStorage.removeItem('userName');
            window.localStorage.removeItem('userId');
            window.localStorage.removeItem('apiToken');
            window.location.reload(true);
        },


        isNotEmpty(value) {
            if (value !== '') {
                return true;
            }
            return false;
        }
    }
}
</script>

<style scoped>

</style>
