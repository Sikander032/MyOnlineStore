<template>
    <!-- Steps-->
    <div class="steps steps-light pt-2 pb-3 mb-5"><a href="/shop-cart" class="step-item active">
        <div class="step-progress"><span class="step-count">1</span></div>
        <div class="step-label"><i class="ci-cart"></i>Cart</div></a><a class="step-item" :class="[$route.name == 'check-out' ? ['active','current'] : '']">
        <div class="step-progress"><span class="step-count">2</span></div>
        <div class="step-label"><i class="ci-user-circle"></i>Details</div></a><a class="step-item" :class="[$route.name == 'shipping' ? ['active','current'] : '']">
        <div class="step-progress"><span class="step-count">3</span></div>
        <div class="step-label"><i class="ci-package"></i>Shipping</div></a><a class="step-item " :class="[$route.name == 'payment' ? ['active','current'] : '']">
        <div class="step-progress"><span class="step-count">4</span></div>
        <div class="step-label"><i class="ci-card"></i>Payment</div></a><a class="step-item" :class="[$route.name == 'checkout-complete' ? ['active','current'] : '']">
        <div class="step-progress"><span class="step-count">5</span></div>
        <div class="step-label"><i class="ci-check-circle"></i>Complete Order</div></a></div>
</template>

<script>
export default {
    name: "checkoutSteps",
    created() {
    }
}
</script>

<style scoped>

</style>
