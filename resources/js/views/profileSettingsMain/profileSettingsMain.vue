<template>
    <div>
        <nav-bar></nav-bar>
        <profile-settings-nav-bar></profile-settings-nav-bar>
        <profile-settings-page></profile-settings-page>
        <footer-banners></footer-banners>
    </div>
</template>

<script>
import NavBar from "../Navbar/NavBar";
import ProfileSettingsNavBar from "../Navbar/profileSettingsNavBar";
import FooterBanners from "../Banners/FooterBanners";
import profileSettingsPage from "../profileSettings/profileSettingsPage";

export default {
    name: "profileSettings",
    components: {FooterBanners, ProfileSettingsNavBar, NavBar, profileSettingsPage}
}
</script>

<style scoped>

</style>
