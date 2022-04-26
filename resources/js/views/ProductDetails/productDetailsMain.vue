<template>
    <div>
        <nav-bar/>
        <product-detail-nav-bar/>
        <product-details/>
        <reviews/>
        <footer-banners/>
    </div>
</template>

<script>
import ProductDetailNavBar from "../Navbar/productDetailNavBar";
import ProductDetails from "../Products/productDetails";
import NavBar from "../Navbar/NavBar";
import FooterBanners from "../Banners/FooterBanners";
import Reviews from "../Reviews/Reviews";
export default {
    name: "productDetailsMain",
    components: {Reviews, FooterBanners, NavBar, ProductDetails, ProductDetailNavBar}
}
</script>

<style scoped>

</style>
