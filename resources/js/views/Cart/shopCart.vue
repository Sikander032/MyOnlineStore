<template>
    <div>
        <nav-bar/>
        <shop-cart-details/>
        <footer-banners/>
    </div>
</template>

<script>
import NavBar from "../Navbar/NavBar";
import FooterBanners from "../Banners/FooterBanners";
import ShopCartDetails from "../CartDetails/shopCartDetails";

export default {
    name: "shopCart",
    components: {ShopCartDetails, FooterBanners, NavBar},
}
</script>

<style scoped>

</style>
