<template>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <user-account-side-bar></user-account-side-bar>
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                    <h6 class="fs-base text-light mb-0">Update you profile details below:</h6><a
                    class="btn btn-primary btn-sm" href="account-signin.html"><i class="ci-sign-out me-2"></i>Sign
                    out</a>
                </div>
                <!-- Profile form-->
                <form @submit.prevent="updateProfile" novalidate   class="needs-validation tab-pane fade active show" autocomplete="off" >
                    <div class="bg-secondary rounded-3 p-4 mb-4">
                        <div class="d-flex align-items-center"><img class="rounded" src="img/shop/account/avatar.jpg"
                                                                    width="90" alt="Susan Gardner">
                            <div class="ps-3">
                                <button class="btn btn-light btn-shadow btn-sm mb-2" type="button"><i
                                    class="ci-loading me-2"></i>Change avatar
                                </button>
                                <div class="p mb-0 fs-ms text-muted">Upload JPG, GIF or PNG image. 300 x 300 required.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-4 gy-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="account-fn">First Name</label>
                            <input class="form-control" v-model="first_name" type="text" id="account-fn" value="Susan" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="account-ln">Last Name</label>
                            <input class="form-control" v-model="last_name" type="text" id="account-ln" value="Gardner" required>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="account-email">Email Address</label>
                            <input class="form-control" v-model="email_address" type="email" id="account-email" value="s.gardner@example.com"
                                   disabled>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="account-phone">Phone Number</label>
                            <input class="form-control" v-model="phone_number" type="text" id="account-phone" value="+7 (805) 348 95 72"
                                   required>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label" for="account-pass">Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" v-model="current_password" id="account-pass1" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox"><span
                                    class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="account-pass">New Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" v-model="password" id="account-pass" required>
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox" required><span
                                    class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="account-confirm-pass">Confirm Password</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" v-model="confirm_password" required id="account-confirm-pass">
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox" required>
                                    <span class="password-toggle-indicator">
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2 mb-3">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="subscribe_me" checked>
                                    <label class="form-check-label" for="subscribe_me">Subscribe me to
                                        Newsletter</label>
                                </div>
                                <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Update profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</template>

<script>
import UserAccountSideBar from "../userAccountSideBar/userAccountSideBar";
export default {
    name: "profile-settings",
    components: {UserAccountSideBar},
    created() {
        this.getUserProfile();
    },
    data() {
        return {
            first_name:'',
            last_name:'',
            email_address:this.$store.state.emailAddress,
            phone_number:'',
            password:'',
            confirm_password:'',
            current_password:''
        }
    },
    methods: {
        updateProfile() {
            if(! this.checkValidation()){
                return false;
            }
            axios.post(this.BaseUrl + '/api/user/update-profile', {
                user_id: this.$store.state.userId,
                api_token: this.$store.state.apiToken,
                first_name: this.first_name,
                last_name: this.last_name,
                phone_number: this.phone_number,
                email_address: this.email_address,
                password: this.password,
                password_confirmation: this.confirm_password,
                current_password: this.current_password
            }).then(response => {
                let nameArray = response.data.name.split(' ')
                this.first_name = nameArray[0];
                this.last_name = nameArray[1];
                this.$toast.success('Successfull');
            }).catch(error => {
                this.$toast.error(error.response.data.message);
            });
        },

        checkValidation() {
            if(this.isEmpty(this.first_name)){
                this.$toast.error('First name can not be empty');
                 return false;
            }
            if(this.isEmpty(this.last_name)){
                this.$toast.error('Last name can not be empty');
                return false;
            }
            if(this.isEmpty(this.phone_number)){
                this.$toast.error('Phone Number can not be empty');
                return false;
            }
            return true;
        },

        isEmpty(field) {
            if(field == '' || field == null)
            {
                return true;
            }
            return false;
        },

        getUserProfile() {
            axios.get(this.BaseUrl + '/api/user', {
                params: {
                    api_token: this.$store.state.apiToken,
                }
            }).then(response => {

                let nameArray = response.data.name.split(' ')
                this.first_name = nameArray[0];
                this.last_name = nameArray[1];

            }).catch(error => {
                this.$toast.error(error.response.data.message);
            });
        },
    }
}
</script>

<style scoped>

</style>
