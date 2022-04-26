<template>
    <section class="tns-carousel tns-controls-lg">
        <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;responsive&quot;: {&quot;0&quot;:{&quot;nav&quot;:true, &quot;controls&quot;: false},&quot;992&quot;:{&quot;nav&quot;:false, &quot;controls&quot;: true}}}">
            <!-- Item-->
            <div  v-for="slide in slides" :key="slide.id"  class="px-lg-5" style="background-color: #3aafd2;">
                <div class="d-lg-flex justify-content-between align-items-center ps-lg-4"><img class="d-block order-lg-2 me-lg-n5 flex-shrink-0" src="img/home/hero-slider/01.jpg" alt="Summer Collection">
                    <div class="position-relative mx-auto me-lg-n5 py-5 px-4 mb-lg-5 order-lg-1" style="max-width: 42rem;">
                        <div class="pb-lg-5 mb-lg-5 text-center text-lg-start text-lg-nowrap">
                            <h3 class="h2 text-light fw-light pb-1 from-start">Has just arrived!</h3>
                            <h2 class="text-light display-5 from-start delay-1">Huge Summer Collection</h2>
                            <p class="fs-lg text-light pb-3 from-start delay-2">Swimwear, Tops, Shorts, Sunglasses &amp; much more...</p>
                            <div class="d-table scale-up delay-4 mx-auto mx-lg-0"><a class="btn btn-primary" href="shop-grid-ls.html">Shop Now<i class="ci-arrow-right ms-2 me-n1"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
export default {
    name: "MainPageSlider",
    data () {
        return {
            slides : [],
        }
    },
    created() {
        let self = this;
        axios.get('http://127.0.0.1:8999/api/main-page-slider', {
            headers: {
                'X-Authorization': self.api_token
            },
            params: {
                // trending_products: true,
                // therapist_id: self.therapist_id,
                // session_type_id: self.session_type_id,
                // is_first_date: self.is_first_date,
                // date: self.current_date,
                // timezone: self.TimeZone,
                // device_type: 'web'
            }
        }).then(function (response) {
            // alert(0);
            self.slides = response.data.data;
            // alert(self.slides.length);
            // self.products = response.data.data;
            // console.log(self.products);
            // loader.hide();
            // self.slot = response.data;
            // self.current_date = response.data.date;
            // self.availability = response.data.availability;
            // self.leave_duration = response.data.therapist_leave_period;
            // self.isReady = true;
            // self.availabilitySlotsArray = self.availability.concat(self.leave_duration);
        })["catch"](function (error) {
            console.log(error);
            // loader.hide();
            // self.isReady = false;
            // self.showNotification('error', error.response.data.message);
        });
    },
}
</script>

<style scoped>

</style>
