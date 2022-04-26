<template>
    <main class="page-wrapper">
        <nav-bar/>
        <check-out-complete/>
        <footer-banners/>
    </main>
</template>

<script>
import NavBar from "../Navbar/NavBar";
import FooterBanners from "../Banners/FooterBanners";
import CheckOutComplete from "../Checkout/checkOutComplete";
export default {
    name: "checkOutCompleteMain",
    components: {CheckOutComplete, FooterBanners, NavBar}
}
</script>

<style scoped>

</style>
