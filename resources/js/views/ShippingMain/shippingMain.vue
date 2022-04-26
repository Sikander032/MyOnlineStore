<template>
    <div>
        <nav-bar/>
        <shipping-navbar/>
        <shipping-detail/>
        <footer-banners/>
    </div>
</template>

<script>
import ShippingNavbar from "../Navbar/shippingNavbar";
import NavBar from "../Navbar/NavBar";
import FooterBanners from "../Banners/FooterBanners";
import ShippingDetail from "../Shipping/shippingDetail";

export default {
    name: "shippingMain",
    components: {ShippingDetail, FooterBanners, NavBar, ShippingNavbar}
}
</script>

<style scoped>

</style>
