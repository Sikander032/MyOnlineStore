<template>
    <div class="navbar-tool dropdown ms-3">
        <router-link class="navbar-tool-icon-box bg-secondary dropdown-toggle" :to="{name: 'shop-cart', params:{}}"><span
        class="navbar-tool-label">{{ $store.state.cartCount }}</span><i class="navbar-tool-icon ci-cart"></i>
        </router-link>
        <router-link class="navbar-tool-text" :to="{name: 'shop-cart', params:{}}" >
            <small>My Cart</small>{{ $store.state.cartTotal.toFixed(2) }}
        </router-link>
        <!-- Cart dropdown-->
        <div class="dropdown-menu dropdown-menu-end">
            <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                <div v-if="$store.state.cart.length > 0" style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                    <div v-if="$store.state.cart.length > 0" v-for="item in $store.state.cart" :key="item.id"
                         class="widget-cart-item pb-2 border-bottom">
                        <button class="btn-close text-danger" type="button" aria-label="Remove"><span aria-hidden="true"
                                                                                                      @click.prevent="removeFromCart(item)">&times;</span>
                        </button>
                        <div class="d-flex align-items-center">
                            <router-link :to="{name: 'product-details', params:{ product_id: item.id}}" class="flex-shrink-0">
                             <img :src="'/img/shop/catalog/'+item.image" width="64" alt="Product">
                            </router-link>
                            <div class="ps-2">
                                <h6 class="widget-product-title">
                                    <router-link :to="{name: 'product-details', params:{ product_id: item.id}}">
                                        {{ item.name }}
                                    </router-link>
                                </h6>
                                <div class="widget-product-meta"><span
                                    class="text-accent me-2">${{ item.price }}<small></small></span><span
                                    class="text-muted">x {{ item.quantity }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="mt-120 ml-15 mb-95" >
                    <p class="text-center italic"> Add some items to the cart first </p>
                </div>
                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                    <div class="fs-sm me-2 py-2"><span class="text-muted">Subtotal:</span><span
                        class="text-accent fs-base ms-1">${{ $store.state.cartTotal }}<small></small></span>
                    </div>
                    <router-link :to="{name: 'shop-cart', params:{}}" class="btn btn-outline-secondary btn-sm">Expand cart<i class="ci-arrow-right ms-1 me-n1"></i></router-link>
                </div>
                <a @click="addToCart()"
                             class="btn btn-primary btn-sm d-block w-100"><i
                    class="ci-card me-2 fs-base align-middle"></i>Checkout
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "miniCart",
    methods: {
        removeFromCart(item) {
            this.$store.commit('removeFromCart', item);
        },
        addToCart() {
            axios.put(this.BaseUrl + '/api/add-to-cart', {
                user_id: this.$store.state.userId,
                order_id: this.$store.state.orderId,
                cart: this.$store.state.cart,
            }).then(response => {
                if (response.data.success == true) {
                    this.$store.commit('saveOrderId', response.data.order_id);
                    if (! this.$route.path.includes("checkout")) {
                        this.$router.push('/checkout');
                    }
                }
            })["catch"](function (error) {
                this.$toast.error('Oops Something went wrong');
            });
        },
    },
}
</script>

<style scoped>
.mt-120{
    margin-top: 120px;
}
.ml-15{
    margin-left: 15px;
}
.mb-95{
    margin-bottom: 95px;
}
</style>
