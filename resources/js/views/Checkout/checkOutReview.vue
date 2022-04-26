<template>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
              <checkout-steps></checkout-steps>
                <!-- Order details-->
                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Review your order</h2>
                <!-- Item-->
                <div v-for="item in $store.state.cart" :key="item.id" class="d-sm-flex justify-content-between my-4 pb-3 border-bottom">
                    <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"><img :src="'img/shop/catalog/'+item.image" width="160" alt="Product"></a>
                        <div class="pt-2">
                            <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">{{ item.name }}</a></h3>
                            <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>
                            <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue</div>
                            <div class="fs-lg text-accent pt-2">${{ item.price }}<small>00</small></div>
                        </div>
                    </div>
                    <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-end" style="max-width: 9rem;">
                        <p class="mb-0"><span class="text-muted fs-sm">Quantity:</span><span>&nbsp;{{item.quantity}}</span></p>
                        <button class="btn btn-link px-0" type="button"><i class="ci-edit me-2"></i><span class="fs-sm">Edit</span></button>
                    </div>
                </div>
                <!-- Client details-->
                <div class="bg-secondary rounded-3 px-4 pt-4 pb-2">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="h6">Shipping to:</h4>
                            <ul class="list-unstyled fs-sm">
                                <li><span class="text-muted">Client:&nbsp;</span>Susan Gardner</li>
                                <li><span class="text-muted">Address:&nbsp;</span>44 Shirley Ave. West Chicago, IL 60185, USA</li>
                                <li><span class="text-muted">Phone:&nbsp;</span>+1 (808) 764 554 330</li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="h6">Payment method:</h4>
                            <ul class="list-unstyled fs-sm">
                                <li><span class="text-muted">Credit Card:&nbsp;</span>**** **** **** 5300</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Navigation (desktop)-->
                <div class="d-none d-lg-flex pt-4">
                    <div class="w-50 pe-3"><router-link :to="{name: 'payment', params:{}}" class="btn btn-secondary d-block w-100" ><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Payment</span><span class="d-inline d-sm-none">Back</span></router-link></div>
                    <div class="w-50 ps-2"><router-link :to="{name: 'checkout-complete', params:{}}" class="btn btn-primary d-block w-100" ><span class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></router-link></div>
                </div>
            </section>
            <!-- Sidebar-->
            <order-summary></order-summary>
        </div>
        <!-- Navigation (mobile)-->
        <div class="row d-lg-none">
            <div class="col-lg-8">
                <div class="d-flex pt-4 mt-3">
                    <div class="w-50 pe-3"><router-link :to="{name: 'check-out', params:{}}" class="btn btn-secondary d-block w-100" ><i class="ci-arrow-left mt-sm-0 me-1"></i><span class="d-none d-sm-inline">Back to Payment</span><span class="d-inline d-sm-none">Back</span></router-link></div>
                    <div class="w-50 ps-2"><router-link :to="{name: 'checkout-complete', params:{}}" class="btn btn-primary d-block w-100" ><span class="d-none d-sm-inline">Complete order</span><span class="d-inline d-sm-none">Complete</span><i class="ci-arrow-right mt-sm-0 ms-1"></i></router-link></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import OrderSummary from "./orderSummary";
import CheckoutSteps from "./checkoutSteps";
export default {
    name: "checkOutReview",
    components: {CheckoutSteps, OrderSummary}
}
</script>

<style scoped>

</style>
