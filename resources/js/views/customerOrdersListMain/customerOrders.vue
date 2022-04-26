<template>
    <div>
        <nav-bar></nav-bar>
        <customer-orders-nav-bar></customer-orders-nav-bar>
        <orders-list
            :customerOrders="customerOrders"
        >

        </orders-list>
        <footer-banners></footer-banners>
    </div>
</template>

<script>
import NavBar from "../Navbar/NavBar";
import FooterBanners from "../Banners/FooterBanners";
import OrdersList from "../customerOrders/ordersList";
import CustomerOrdersNavBar from "../Navbar/customerOrdersNavBar";
export default {
    name: "customerOrders",
    components: {CustomerOrdersNavBar, OrdersList, FooterBanners, NavBar},
    data() {
        return {
            customerOrders: []
        }
    },
    created() {
        this.getCustomerOrders();
    },
    methods:{
        getCustomerOrders() {
            let loader = this.$loading.show();
            axios.get('http://127.0.0.1:8999/api/customer-orders', {
                params: {
                    user_id: this.$store.state.userId,
                    api_token: this.$store.state.apiToken
                }
            }).then(response => {
                if(response.status === 200) {
                    this.customerOrders = response.data.data;
                }
                loader.hide();
            })["catch"](function (error) {
                loader.hide();
                console.log(error);
            });
        },
    }
}
</script>

<style scoped>

</style>
