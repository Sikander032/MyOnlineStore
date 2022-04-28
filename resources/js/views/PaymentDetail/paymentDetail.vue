<template>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
                <checkout-steps></checkout-steps>
                <!-- Payment methods accordion-->
                <h2 class="h6 pb-3 mb-2">Choose payment method</h2>
                <div class="accordion mb-2" id="payment-method">
                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button" href="#card" data-bs-toggle="collapse"><i
                            class="ci-card fs-lg me-2 mt-n1 align-middle"></i>Pay with Credit Card</a></h3>
                        <div v-if="!paidByCredit" class="accordion-collapse collapse show" id="card"
                             data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p class="fs-sm">We accept following credit cards:&nbsp;&nbsp;<img
                                    class="d-inline-block align-middle" src="img/cards.png" width="187"
                                    alt="Cerdit Cards"></p>
                                <div class="credit-card-wrapper"></div>
                                <div class="credit-card-form row">
                                    <StripeElements
                                        :stripe-key="'pk_test_51HX3AyK4H8YbtPwtBsyheWrUGEC0GuHuDiMhJOLLMZt51eFtOuEFypFauBlcdAxCvYrcJXiRdlUBF5XeEkPjLKj000v8rSGhEu'"
                                        :instance-options="instanceOptions"
                                        :elements-options="elementsOptions"
                                        #default="{ elements }"
                                        ref="elms"
                                    >

                                        <StripeElement
                                            type="card"
                                            :elements="elements"
                                            :options="cardOptions"
                                            ref="card"
                                            class="mb-3 col-sm-6 border-1"
                                        />
                                    </StripeElements>

                                    <div class="col-sm-6">
                                        <button @click="pay" class="btn btn-outline-primary d-block w-100 mt-0"
                                                type="button">Pay
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div v-else>
                            <p class="text-center">Paid With Credit Card</p>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#paypal"
                                                        data-bs-toggle="collapse"><i
                            class="ci-paypal me-2 align-middle"></i>Pay with PayPal</a></h3>
                        <div class="accordion-collapse collapse" id="paypal" data-bs-parent="#payment-method">
                            <div  v-if="! paidWithPayPal" class="accordion-body fs-sm">
                                <p><span class='fw-medium'>PayPal</span> - the safer, easier way to pay</p>
                                <form class="row needs-validation">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <input class="form-control" v-model="email_address" type="email"
                                                   placeholder="E-mail">
                                            <div class="invalid-feedback">Please enter valid email address</div>
                                        </div>
                                    </div>
                                    <!--                                <div class="col-sm-6">-->
                                    <!--                                    <div class="mb-3">-->
                                    <!--                                        <input class="form-control" v-model="password" type="password" placeholder="Password" required>-->
                                    <!--                                        <div class="invalid-feedback">Please enter your password</div>-->
                                    <!--                                    </div>-->
                                    <!--                                </div>-->
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <!--                                        <a class="nav-link-style" href="#">Forgot password?</a>-->
                                            <button class="btn btn-primary" @click="payPalPayment">Pay With PayPal
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div v-else>
                                <p class="text-center mt-4">Payment Done With Pay Pal</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header"><a class="accordion-button collapsed" href="#points"
                                                        data-bs-toggle="collapse"><i class="ci-gift me-2"></i>Redeem
                            Reward Points</a></h3>
                        <div class="accordion-collapse collapse" id="points" data-bs-parent="#payment-method">
                            <div class="accordion-body">
                                <p>You currently have<span class="fw-medium">&nbsp;384</span>&nbsp;Reward Points to
                                    spend.</p>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" id="use_points">
                                    <label class="form-check-label" for="use_points">Use my Reward Points to pay for
                                        this order.</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4">
                    <div class="w-50 pe-3">
                        <router-link :to="{name: 'shipping', params:{}}" class="btn btn-secondary d-block w-100"><i
                            class="ci-arrow-left mt-sm-0 me-1"></i><span
                            class="d-none d-sm-inline">Back to Shipping</span><span
                            class="d-inline d-sm-none">Back</span></router-link>
                    </div>
                    <div @click="removeDataFromStore()" class="w-50 ps-2">
                        <router-link :to="{name: 'checkout-complete', params:{}}" class="btn btn-primary d-block w-100">
                            <span class="d-none d-sm-inline">Complete Order</span><span class="d-inline d-sm-none">Review order</span><i
                            class="ci-arrow-right mt-sm-0 ms-1"></i></router-link>
                    </div>
                </div>
            </section>
            <!-- Sidebar-order summary-->
            <order-summary></order-summary>
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3">
                        <router-link :to="{name: 'shipping', params:{}}" class="btn btn-secondary d-block w-100"><i
                            class="ci-arrow-left mt-sm-0 me-1"></i><span
                            class="d-none d-sm-inline">Back to Shipping</span><span
                            class="d-inline d-sm-none">Back</span></router-link>
                    </div>
                    <div @click="removeDataFromStore()" class="w-50 ps-2">
                        <router-link :to="{name: 'checkout-complete', params:{}}" class="btn btn-primary d-block w-100">
                            <span class="d-none d-sm-inline">Complete Order</span><span class="d-inline d-sm-none">Review order</span><i
                            class="ci-arrow-right mt-sm-0 ms-1"></i></router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OrderSummary from "../Checkout/orderSummary";
import CheckoutSteps from "../Checkout/checkoutSteps";
import {StripeElement, StripeElements} from "vue-stripe-elements-plus/src";
import {isEmpty} from "lodash";

export default {
    name: "paymentDetail",
    mounted: function () {
        this.showToastr()
    },
    created() {
        if (this.isNotEmpty(this.$route.query.paymentId) || this.isNotEmpty(this.$route.query.token) || this.isNotEmpty(this.$route.query.PayerID)) {
            this.payPalPaymentStatus(this.$route.query.paymentId, this.$route.query.token, this.$route.query.PayerID);
        }
    },

    components: {CheckoutSteps, OrderSummary, StripeElements, StripeElement},
    data: () => ({
        paidByCredit: false,
        paidWithPayPal: false,
        instanceOptions: {
            // https://stripe.com/docs/js/initializing#init_stripe_js-options
        },
        elementsOptions: {
            // https://stripe.com/docs/js/elements_object/create#stripe_elements-options
        },
        cardOptions: {
            // reactive
            // remember about Vue 2 reactivity limitations when dealing with options
            value: {
                postalCode: ''
            }
            // https://stripe.com/docs/stripe.js#element-options
        },
        elements: {}
    }),
    methods: {
        pay() {
            let loader = this.$loading.show();
            // ref in template
            const groupComponent = this.$refs.elms
            const cardComponent = this.$refs.card
            // Get stripe element
            const cardElement = cardComponent.stripeElement

            // Access instance methods, e.g. createToken()
            groupComponent.instance.createToken(cardElement).then(result => {
                // Handle result.error or result.token
                axios.defaults.baseURL = this.BaseUrl + '/api';
                axios.post('/create-charge', {
                    stripe_token: result.token.id,
                    amount_to_charge: this.$store.state.cartTotal.toFixed(2)
                }).then(response => {
                    console.log(response.data.status);
                    if (response.data.status == 'succeeded') {
                        this.paidByCredit = true
                    }
                    this.$toast.open('payment successfull!');
                    this.updateCartPayment(response, loader);
                })["catch"](function (error) {
                    console.log(error);
                    loader.hide();
                });
            })
        },

        updateCartPayment(response, loader) {
            loader.hide();
            if (!isEmpty(response)) {
                axios.defaults.baseURL = this.BaseUrl + '/api';
                axios.post('/update-cart-payment', {
                    order_id: this.$store.state.orderId,
                    payment_method: 'credit-card',
                    payment_id: response.data.id
                }).then(response => {
                    console.log(response);
                })["catch"](function (error) {
                    console.log(error);
                });
            }
        },

        removeDataFromStore() {

        },

        showToastr: function () {

        },

        payPalPayment() {
            let loader = this.$loading.show();
            axios.post(this.BaseUrl + '/api/paypal/payment/add-fund', {
                order_id: this.$store.state.orderId,
                cart: this.$store.state.cart,
                cart_total: this.$store.state.cartTotal
            }).then(response => {
                if(response.data.url) {
                    window.location.href = response.data.url
                } else {
                    this.$toast.error('oops an error occured');
                }
            })["catch"](function (error) {
                loader.hide();
                this.$toast.error('oops an error occured');
            });
        },

        isNotEmpty(value) {
            return !(value == '' || value == null);
        },

        payPalPaymentStatus(paymentId, token, PayerID) {
            let loader = this.$loading.show();
            axios.get(this.BaseUrl + '/api/paypal/payment/status', {
                params: {
                    order_id: this.$store.state.orderId,
                    payment_id: paymentId,
                    token: token,
                    payer_id: PayerID
                }
            }).then(response => {
                loader.hide();
                if (response.data.status == 'approved') {
                    this.paidWithPayPal = true,
                    this.$toast.success('Payment Successfull');
                } else {
                    this.$toast.error('The payment has been cancelled at customer\'s request.')
                }
            })["catch"](function (error) {
                loader.hide();
                this.$toast.error('oops an error occured');
            });
        },


    },
}
</script>

<style scoped>

</style>
