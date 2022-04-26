<template>
    <div>
        <nav-bar/>
        <check-out-nav-bar/>
        <checkout/>
        <footer-banners/>
    </div>
</template>

<script>
import CheckOutNavBar from "../Navbar/checkOutNavBar";
import Checkout from "./Checkout";
import FooterBanners from "../Banners/FooterBanners";
import NavBar from "../Navbar/NavBar";

export default {
    name: "CheckOutMain",
    components: {NavBar, FooterBanners, Checkout, CheckOutNavBar}
}
</script>

<style scoped>

</style>
