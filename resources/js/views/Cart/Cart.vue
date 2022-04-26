<template>
    <div>
        <nav-bar/>
        <cart-nav-bar/>
        <cart-items/>
        <footer-banners/>
    </div>
</template>

<script>
import CartItems from "../Products/cartItems";
import CartNavBar from "../Navbar/cartNavBar";
import NavBar from "../Navbar/NavBar";
import FooterBanners from "../Banners/FooterBanners";

export default {
    name: "Cart",
    components: {FooterBanners, NavBar, CartNavBar, CartItems},

}
</script>

<style scoped>

</style>
