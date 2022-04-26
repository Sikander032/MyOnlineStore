<template>
    <div>
    <nav-bar></nav-bar>
    <sign-in-sign-up-page></sign-in-sign-up-page>
    <footer-banners></footer-banners>
    </div>
</template>

<script>
import SignInSignUpPage from "../SignInSignUpPage/SignInSignUpPage";
import NavBar from "../Navbar/NavBar";
import FooterBanners from "../Banners/FooterBanners";

export default {
    name: "SignInSignUpPageMain",
    components: {FooterBanners, NavBar, SignInSignUpPage}
}
</script>

<style scoped>

</style>
