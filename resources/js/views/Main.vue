<template>
    <div>
        <main class="page-wrapper">
            <nav-bar/>
           <!--  to be implement later-->
            <!--<main-page-slider/>-->
            <!--<popular-categories/>-->
            <products/>
            <banners/>
            <featured-categories/>
            <brands/>
        </main>
        <footer-banners/>
    </div>
</template>

<script>
import NavBar from "./Navbar/NavBar";
import MainPageSlider from "./Sliders/MainPageSlider";
import PopularCategories from "./Categories/PopularCategories";
import Products from "./Products/Products";
import Banners from "./Banners/Banners";
import FeaturedCategories from "./Categories/FeaturedCategories";
import Brands from "./Brands/Brands";
import FooterBanners from "./Banners/FooterBanners";
import router from "../Router";
export default {
    name: "Main.vue",
    components:{
        NavBar,
        MainPageSlider,
        Products,
        Banners,
        FeaturedCategories,
        Brands,
        FooterBanners,
        PopularCategories
    },
    created() {
        this.showToastr();
        if(this.$route.query.payment === 'pay-pal'){
            router.push('/payment');
        }
    },
    methods:{
        showToastr: function () {
            let instance = this.$toast.open('You did it!');
        }
    }

}
</script>

<style scoped>

</style>
