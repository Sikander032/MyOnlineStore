<template>
    <main class="page-wrapper">
        <nav-bar/>
        <nav-bar-check-out-review/>
        <check-out-review/>
        <footer-banners/>
    </main>
</template>

<script>
import NavBar from "../Navbar/NavBar";
import NavBarCheckOutReview from "../Navbar/navBarCheckOutReview";
import CheckOutReview from "../Checkout/checkOutReview";
import FooterBanners from "../Banners/FooterBanners";
export default {
    name: "checkOutReviewMain",
    components: {FooterBanners, CheckOutReview, NavBarCheckOutReview, NavBar}
}
</script>

<style scoped>

</style>
