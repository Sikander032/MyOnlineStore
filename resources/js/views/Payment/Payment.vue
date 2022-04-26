<template>
    <main class="page-wrapper">
        <payment-nav-bar/>
        <payment-detail/>
    </main>
</template>

<script>
import PaymentNavBar from "../Navbar/paymentNavBar";
import PaymentDetail from "../PaymentDetail/paymentDetail";
export default {
    name: "Payment",
    components: {PaymentDetail, PaymentNavBar}
}
</script>

<style scoped>

</style>
