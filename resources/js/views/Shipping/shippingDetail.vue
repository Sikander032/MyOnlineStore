<template>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
                <checkout-steps></checkout-steps>
                <!-- Shipping methods table-->
                <h2 class="h6 pb-3 mb-2">Choose shipping method</h2>
                <div class="table-responsive">
                    <table class="table table-hover fs-sm border-top">
                        <thead>
                        <tr>
                            <th class="align-middle"></th>
                            <th class="align-middle">Shipping method</th>
                            <th class="align-middle">Delivery time</th>
                            <th class="align-middle">Handling fee</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-check mb-4">
                                    <input class="form-check-input"  @change="saveShippingMethod($event)" type="radio" value="courier" id="courier" name="shipping-method" :checked="'courier' == shipping_method">
                                    <label class="form-check-label" for="courier"></label>
                                </div>
                            </td>
                            <td class="align-middle"><span class="text-dark fw-medium">Courier</span><br><span class="text-muted">All addresses (default zone), United States &amp; Canada</span></td>
                            <td class="align-middle">2 - 4 days</td>
                            <td class="align-middle">$26.50</td>
                        </tr>
                                                <tr>
                            <td>
                                <div class="form-check mb-4">
                                    <input class="form-check-input"  @change="saveShippingMethod($event)" type="radio" id="courier" value="pick-up" :checked=" 'pick-up' == shipping_method" name="shipping-method">
                                    <label class="form-check-label" for="courier"></label>
                                </div>
                            </td>
                            <td class="align-middle"><span class="text-dark fw-medium">Pick Up</span><br><span class="text-muted">All addresses (default zone), United States &amp; Canada</span></td>
                            <td class="align-middle">2 - 4 days</td>
                            <td class="align-middle">$26.50</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4">
                    <div class="w-50 pe-3"><router-link :to="{name: 'check-out', params:{}}" class="btn btn-secondary d-block w-100" ><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Addresses</span><span class="d-inline d-sm-none">Back</span></router-link></div>
                    <div @click="updateShippingMethod()"  class="w-50 ps-2"><router-link :to="{name: 'payment', params:{}}" class="btn btn-primary d-block w-100" ><span class="d-none d-sm-inline">Proceed to Payment</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></router-link></div>
                </div>
            </section>
            <!-- Sidebar-->
            <order-summary></order-summary>
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><router-link :to="{name: 'check-out', params:{}}" class="btn btn-secondary d-block w-100"><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Adresses</span><span class="d-inline d-sm-none">Back</span></router-link></div>
                    <div @click="updateShippingMethod()"  class="w-50 ps-2"><router-link :to="{name: 'payment', params:{}}" class="btn btn-primary d-block w-100" ><span class="d-none d-sm-inline">Proceed to Payment</span><span class="d-inline d-sm-none">Next</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></router-link></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OrderSummary from "../Checkout/orderSummary";
import CheckoutSteps from "../Checkout/checkoutSteps";
import {isEmpty} from "lodash";
export default {
    name: "shippingDetail",
    components: {CheckoutSteps, OrderSummary},
    data: () => ({
        shipping_method: ''
    }),
    created() {
        this.shipping_method = this.$store.state.shippingMethod;
    },
    methods: {
        saveShippingMethod(event) {
            this.$store.commit('saveShippingMethod', event.target.value);
            this.shipping_method = this.$store.state.shippingMethod;
        },
        updateShippingMethod() {
            let loader = this.$loading.show();
            axios.put('http://127.0.0.1:8999/api/update-shipping-method', {
                    order_id: this.$store.state.orderId,
                    shipping_method: this.shipping_method,
            }).then(response => {
                console.log(response);
                loader.hide();
            })["catch"](function (error) {
                console.log(error);
                loader.hide();
            });
        },
    },
}
</script>

<style scoped>

</style>
