<template>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
              <checkout-steps></checkout-steps>
                <!-- Autor info-->
                <div class="d-sm-flex justify-content-between align-items-center bg-secondary p-4 rounded-3 mb-grid-gutter">
                    <div class="d-flex align-items-center">
                        <div class="img-thumbnail rounded-circle position-relative flex-shrink-0"><span class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip" title="Reward points">384</span><img class="rounded-circle" src="img/shop/account/avatar.jpg" width="90" alt="Susan Gardner"></div>
                        <div class="ps-3">
                            <h3 class="fs-base mb-0">Susan Gardner</h3><span class="text-accent fs-sm">s.gardner@example.com</span>
                        </div>
                    </div><a class="btn btn-light btn-sm btn-shadow mt-3 mt-sm-0" href="account-profile.html"><i class="ci-edit me-2"></i>Edit profile</a>
                </div>
                <!-- Shipping address-->
                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>
                <form @submit.prevent="saveShippingAddress(JSON.stringify(shipping_address))" class="needs-validation tab-pane fade active show" autocomplete="off" novalidate>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-fn">First Name *</label>
                                <input class="form-control" v-model="shipping_address.first_name" type="text"
                                       id="checkout-fn" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-ln">Last Name *</label>
                                <input class="form-control" v-model="shipping_address.last_name" type="text"
                                       id="checkout-ln" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-email">E-mail Address *</label>
                                <input class="form-control" v-model="shipping_address.email" type="email"
                                       id="checkout-email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-phone">Phone Number *</label>
                                <input class="form-control" v-model="shipping_address.phone_number" type="text"
                                       id="checkout-phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-company">Company</label>
                                <input class="form-control" v-model="shipping_address.company" type="text"
                                       id="checkout-company">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-country">Country</label>
                                <select v-model="shipping_address.country" class="form-select" id="checkout-country">
                                    <option>Choose country</option>
                                    <option>Pakistan</option>
                                    <option>Australia</option>
                                    <option>Canada</option>
                                    <option>France</option>
                                    <option>Germany</option>
                                    <option>Switzerland</option>
                                    <option>USA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-city">City</label>
                                <select v-model="shipping_address.city" class="form-select" id="checkout-city">
                                    <option>Choose city</option>
                                    <option>Amsterdam</option>
                                    <option>Berlin</option>
                                    <option>Geneve</option>
                                    <option>New York</option>
                                    <option>Paris</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-zip">ZIP Code</label>
                                <input class="form-control" v-model="shipping_address.zip_code" type="text"
                                       id="checkout-zip">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-address-1">Address 1 *</label>
                                <input class="form-control" v-model="shipping_address.address_1" type="text"
                                       id="checkout-address-1" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-address-2">Address 2</label>
                                <input class="form-control" v-model="shipping_address.address_2" type="text"
                                       id="checkout-address-2">
                            </div>
                        </div>
                    </div>
                    <h6 class="mb-3 py-3 border-bottom">Billing address</h6>
                    <div class="form-check">
                        <input class="form-check-input" v-model="shipping_address.is_billing_address_same"
                               type="checkbox" checked id="same-address">
                        <label class="form-check-label" for="same-address">Same as shipping address</label>
                    </div>
                    <div class="col-sm-6" v-if="! shipping_address.is_billing_address_same">
                        <div class="mb-3">
                            <label class="form-label" for="billing-address-2">Billing Address</label>
                            <input class="form-control" v-model="shipping_address.billing_address" type="text"
                                   id="billing-address-2" :required="! shipping_address.is_billing_address_same">
                        </div>
                    </div>
                    <small>* Fields marked with * are required</small>

                    <!-- Navigation (desktop)-->
                    <div class="d-none d-lg-flex pt-4 mt-3">
                        <div class="w-50 pe-3">
                            <router-link :to="{name: 'Shop', params:{}}" class="btn btn-secondary d-block w-100"><i
                                class="ci-arrow-left mt-sm-0 me-1"></i><span
                                class="d-none d-sm-inline">Back to Cart</span><span
                                class="d-inline d-sm-none">Back</span></router-link>
                        </div>
                        <div  class="w-50 ps-2">
                            <button  class="btn btn-primary d-block w-100"><span
                                class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </section>
            <!-- Sidebar-->
            <order-summary></order-summary>
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><router-link :to="{name: 'Shop', params:{}}" class="btn btn-secondary d-block w-100" href="shop-cart.html"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Cart</span><span class="d-inline d-sm-none">Back</span></router-link></div>
                    <div @click="saveShippingAddress(JSON.stringify(shipping_address))"  class="w-50 ps-2"><router-link :to="{name: 'shipping', params:{}}"  class="btn btn-primary d-block w-100" ><span class="d-none d-sm-inline">Proceed to Shipping</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></router-link></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OrderSummary from "./orderSummary";
import CheckoutSteps from "./checkoutSteps";
import {isEmpty} from "lodash";
import {StripeElement, StripeElements} from "vue-stripe-elements-plus/src";
export default {
    name: "Checkout",
    data: () => ({
        shipping_address: {
            first_name: '',
            last_name: '',
            email: '',
            phone_number: '',
            company: '',
            country: '',
            city: '',
            zip_code: '',
            address_1: '',
            address_2: '',
            is_billing_address_same: true,
            billing_address: '',
        },
    }),
    components: {CheckoutSteps, OrderSummary},
    created() {
         let addressString = isEmpty(this.$store.state.shippingAddress) ? '' : this.$store.state.shippingAddress ;
         let parsedAddress = JSON.parse(addressString);

        this.shipping_address.first_name = parsedAddress.first_name;
        this.shipping_address.last_name = isEmpty(parsedAddress.last_name)  ? '' : parsedAddress.last_name;
        this.shipping_address.email = isEmpty(parsedAddress.email)  ? '' : parsedAddress.email;
        this.shipping_address.phone_number = isEmpty(parsedAddress.phone_number)  ? '' : parsedAddress.phone_number;
        this.shipping_address.company = isEmpty(parsedAddress.company)  ? '' : parsedAddress.company;
        this.shipping_address.country = isEmpty(parsedAddress.country)  ? '' : parsedAddress.country;
        this.shipping_address.city = isEmpty(parsedAddress.city)  ? '' : parsedAddress.city;
        this.shipping_address.zip_code = isEmpty(parsedAddress.zip_code)  ? '' : parsedAddress.zip_code;
        this.shipping_address.address_1 = isEmpty(parsedAddress.address_1)  ? '' : parsedAddress.address_1;
        this.shipping_address.address_2 = isEmpty(parsedAddress.address_2)  ? '' : parsedAddress.address_2;
        this.shipping_address.is_billing_address_same = parsedAddress.is_billing_address_same;
        this.shipping_address.billing_address = isEmpty(parsedAddress.billing_address)  ? '' : parsedAddress.billing_address;
    },
    methods: {
        saveShippingAddress(shippingAddress) {
            this.$store.commit('saveShippingAddress', shippingAddress);

            let addressString = isEmpty(this.$store.state.shippingAddress) ? '' : this.$store.state.shippingAddress;
            let parsedAddress = JSON.parse(addressString);
            this.shipping_address.first_name = isEmpty(parsedAddress.first_name) ? '' : parsedAddress.first_name;
            this.shipping_address.last_name = isEmpty(parsedAddress.last_name) ? '' : parsedAddress.last_name;
            this.shipping_address.email = isEmpty(parsedAddress.email) ? '' : parsedAddress.email;
            this.shipping_address.phone_number = isEmpty(parsedAddress.phone_number) ? '' : parsedAddress.phone_number;
            this.shipping_address.company = isEmpty(parsedAddress.company) ? '' : parsedAddress.company;
            this.shipping_address.country = isEmpty(parsedAddress.country) ? '' : parsedAddress.country;
            this.shipping_address.city = isEmpty(parsedAddress.city) ? '' : parsedAddress.city;
            this.shipping_address.zip_code = isEmpty(parsedAddress.zip_code) ? '' : parsedAddress.zip_code;
            this.shipping_address.address_1 = isEmpty(parsedAddress.address_1) ? '' : parsedAddress.address_1;
            this.shipping_address.address_2 = isEmpty(parsedAddress.address_2) ? '' : parsedAddress.address_2;
            this.shipping_address.is_billing_address_same = isEmpty(parsedAddress.is_billing_address_same) ? true : parsedAddress.is_billing_address_same;
            this.shipping_address.billing_address = isEmpty(parsedAddress.billing_address) ? '' : parsedAddress.billing_address;
            // save shipping address and cart to db
            if(this.isNotEmpty(this.shipping_address.first_name) &&this.isNotEmpty(this.shipping_address.last_name) &&
                this.isNotEmpty(this.shipping_address.email) && this.isNotEmpty(this.shipping_address.phone_number) &&
                this.isNotEmpty(this.shipping_address.address_1))
            {

                let loader = this.$loading.show();
                axios.put('http://127.0.0.1:8999/api/add-to-cart', {
                    order_id: this.$store.state.orderId,
                    user_id: this.$store.state.userId,
                    cart: isEmpty(this.$store.state.cart) ? '' : this.$store.state.cart,
                    shipping_address: this.shipping_address
                }).then(response => {
                    if (response.data.success) {
                        this.$store.commit('saveOrderId', response.data.order_id);
                        this.$router.push('shipping');
                    }
                    loader.hide();
                })["catch"](function (error) {
                    loader.hide();
                    console.log(error);
                });
            }
        },

        isNotEmpty(value) {
            if (value !== '') {
                return true;
            }
            return false;
        },
    },
}
</script>

<style scoped>

</style>
