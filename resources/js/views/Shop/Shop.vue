<template>
    <div>
        <nav-bar/>
        <secondary-navbar/>
        <main-products/>
    </div>
</template>

<script>
import secondaryNavbar from "../Navbar/secondaryNavbar";
import mainProducts from "../Products/mainProducts";
import NavBar from "../Navbar/NavBar";

export default {
    name: "Shop",
    components: {
        mainProducts,
        secondaryNavbar,
        NavBar
    }
}
</script>

<style scoped>

</style>
