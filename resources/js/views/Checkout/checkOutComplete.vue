<template>
    <div class="container pb-5 mb-sm-4">
        <div class="pt-5">
            <div class="card py-3 mt-sm-3">
                <div class="card-body text-center">
                    <h2 class="h4 pb-3">Thank you for your order!</h2>
                    <p class="fs-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
                    <p class="fs-sm mb-2">Make sure you make note of your order number, which is <span class='fw-medium'>{{ orderNumber }}</span></p>
                    <p class="fs-sm">You will be receiving an email shortly with confirmation of your order. <u>You can now:</u></p><a @click="goBackShopping" class="btn btn-secondary mt-3 me-3">Go back shopping</a><a class="btn btn-primary mt-3" href="order-tracking.html"><i class="ci-location"></i>&nbsp;Track order</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {isEmpty} from "lodash";

export default {
    name: "checkOutComplete",
    data() {
        return {
            orderNumber: ''
        }
    },
    created() {
        this.getOrderNumber();
    },
    mounted() {

    },
    methods:{

        getOrderNumber() {
            let loader = this.$loading.show();
            axios.get('http://127.0.0.1:8999/api/complete-order', {
                params: {
                    order_id: this.$store.state.orderId,
                    order_number: this.orderNumber
                }
            }).then(response => {
                if(response.status === 200) {
                    this.$store.commit('clearCartFromStore');
                    this.orderNumber = response.data.orderNumber;
                }
                loader.hide();
            })["catch"](function (error) {
                loader.hide();
                console.log(error);
            });
        },

        goBackShopping() {
            this.$router.push('/');
            window.location.reload(true);
        }
    },

}
</script>

<style scoped>

</style>
