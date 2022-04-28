<template>
    <!-- Products grid (Trending products)-->
    <section class="container pt-md-3 pb-5 mb-md-3">
        <h2 class="h3 text-center">Trending products</h2>
        <div class="row pt-4 mx-n2">
            <!-- Product-->
            <div v-if="products.length > 0 && isResponseReady" v-for="product in products" :key="product.id"
                 :id="'div'+product.id" class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                <!--quick view model-->
                <quick-vue-modal :product=product></quick-vue-modal>
                <!--quick view model-->
                <div class="card product-card">
                    <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Add to wishlist"><i class="ci-heart"></i></button>
                    <router-link :to="{name: 'product-details', params:{ product_id: product.id}}" class="card-img-top d-block overflow-hidden" ><img
                        :src="'img/shop/catalog/'+product.image" alt="Product"></router-link>
                    <router-link :to="{name: 'product-details', params:{ product_id: product.id}}" class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                                   >{{ product.category_name }}</a>
                        <h3 class="product-title fs-sm">
                            <router-link :to="{name: 'product-details', params:{ product_id: product.id}}" >{{ product.name }}</router-link>
                        </h3>
                        <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent">${{
                                    product.price
                                }}<small></small></span></div>
                            <div class="star-rating">
                                <i class="star-rating-icon ci-star-filled active"></i>
                                <i class="star-rating-icon ci-star-filled active"></i>
                                <i class="star-rating-icon ci-star-filled active"></i>
                                <i class="star-rating-icon ci-star-half active"></i>
                                <i class="star-rating-icon ci-star"></i>
                            </div>
                        </div>
                    </router-link>
                    <div class="card-body card-body-hidden">
<!--                        <div class="text-center pb-2">-->
<!--                            <div class="form-check form-option form-check-inline mb-2">-->
<!--                                <input class="form-check-input" type="radio" name="size1" id="s-75">-->
<!--                                <label class="form-option-label" for="s-75">7.5</label>-->
<!--                            </div>-->
<!--                            <div class="form-check form-option form-check-inline mb-2">-->
<!--                                <input class="form-check-input" type="radio" name="size1" id="s-80" checked>-->
<!--                                <label class="form-option-label" for="s-80">8</label>-->
<!--                            </div>-->
<!--                            <div class="form-check form-option form-check-inline mb-2">-->
<!--                                <input class="form-check-input" type="radio" name="size1" id="s-85">-->
<!--                                <label class="form-option-label" for="s-85">8.5</label>-->
<!--                            </div>-->
<!--                            <div class="form-check form-option form-check-inline mb-2">-->
<!--                                <input class="form-check-input" type="radio" name="size1" id="s-90">-->
<!--                                <label class="form-option-label" for="s-90">9</label>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="d-flex mb-2">
                            <select v-model="productSize" class="form-select form-select-sm me-2">
                                <option value="">Select size</option>
                                <option value="xs">XS</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                            </select>
                            <button @click="addToCart(product, productSize)" class="btn btn-primary btn-sm d-block w-100 mb-2"
                                    type="button"><i class="ci-cart fs-sm me-1"></i>Add to Cart
                            </button>
                        </div>
<!--                        <div class="text-center"><a class="nav-link-style fs-ms" :href="'#quick-view'+product.id"-->
<!--                                                    data-bs-toggle="modal"><i class="ci-eye align-middle me-1"></i>Quick-->
<!--                            view</a>-->
<!--                        </div>-->
                    </div>
                </div>
                <hr class="d-sm-none">
            </div>
            <!-- Product-->
        </div>
        <div class="text-center pt-3"><router-link :to="{name:'Shop', params:{}}" class="btn btn-outline-accent" >More products<i
            class="ci-arrow-right ms-1"></i></router-link></div>
    </section>
</template>

<script>
import QuickVueModal from "./quickVueModal";

export default {
    name: "Products",
    components: {QuickVueModal},
    data() {
        return {
            products: [],
            cartItems: [],
            productSize: '',
            isResponseReady:false,
        }
    },
    created() {
        axios.get(this.BaseUrl+ '/api/products', {
            params: {
                trending_products: true,
            }
        }).then(response => {
            this.products = response.data.products;
            this.isResponseReady = true;
        })["catch"](function (error) {
            console.log(error);
        });
    },
    methods: {
        addToCart(item, size) {
            if(this.productSize === '' || this.productSize === null){
                this.$toast.error('please Choose Size First');
                return false;
            }
            this.$store.commit('addToCart', {item, size});
            this.productSize = '';
        },
    }
}
</script>

<style scoped>

</style>
