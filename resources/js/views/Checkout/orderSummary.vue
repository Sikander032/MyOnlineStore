<template>
    <!-- Sidebar-->
    <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
        <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
            <div class="py-2 px-xl-2">
                <div class="widget mb-3">
                    <h2 class="widget-title text-center">Order summary</h2>
                    <div v-if="" v-for="item in $store.state.cart" :key="item.id" class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0" href="shop-single-v1.html"><img :src="'img/shop/catalog/'+item.image" width="64" alt="Product"></a>
                        <div class="ps-2">
                            <h6 class="widget-product-title"><a href="shop-single-v1.html">{{ item.name }}</a></h6>
                            <div class="widget-product-meta"><span class="text-accent me-2">${{ item.price }}<small></small></span><span class="text-muted">x {{item.quantity}}</span></div>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled fs-sm pb-2 border-bottom">
                    <li class="d-flex justify-content-between align-items-center"><span class="me-2">Subtotal:</span><span class="text-end">${{ $store.state.cartTotal.toFixed(2) }}<small></small></span></li>
                    <li class="d-flex justify-content-between align-items-center"><span class="me-2">Shipping:</span><span class="text-end">—</span></li>
                    <li class="d-flex justify-content-between align-items-center"><span class="me-2">Taxes:</span><span class="text-end">—<small></small></span></li>
                    <li class="d-flex justify-content-between align-items-center"><span class="me-2">Discount:</span><span class="text-end">—</span></li>
                </ul>
                <h3 class="fw-normal text-center my-4">${{ $store.state.cartTotal.toFixed(2) }}<small></small></h3>
                <form v-if="false" class="needs-validation" method="post" novalidate>
                    <div class="mb-3">
                        <input class="form-control" type="text" placeholder="Promo code" required>
                        <div class="invalid-feedback">Please provide promo code.</div>
                    </div>
                    <button class="btn btn-outline-primary d-block w-100" type="submit">Apply promo code</button>
                </form>
            </div>
        </div>
    </aside>
</template>

<script>
export default {
    name: "orderSummary"
}
</script>

<style scoped>

</style>
