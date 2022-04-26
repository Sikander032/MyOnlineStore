<template>
    <div class="container" v-if="isProductReady">
        <size-chart-modal
            v-if="showSizeChart"
            @closeChart="showSizeChart = false"
        ></size-chart-modal>
        <!-- Gallery + details-->
        <div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
            <div class="px-lg-3">
                <div class="row">
                    <!-- Product gallery-->
                    <div class="col-lg-7 pe-lg-0 pt-lg-4">
                        <div class="product-gallery">
                            <div class="product-gallery-preview order-sm-2">
                                <div class="product-gallery-preview-item"  v-for="image in product.images" v-bind:class="{ active: image.id == currentActiveImage }" :key="image.id" :id="image.id+'image'">
                                    <img class="image-zoom" :src="'/assets/images/'+image.image_path" :data-zoom="'/assets/images/'+image.image_path" alt="Product image">
                                    <div class="image-zoom-pane"></div>
                                </div>
                            </div>
                            <div class="product-gallery-thumblist order-sm-1" >
                                <a class="product-gallery-thumblist-item"    v-for="image in product.images"  :key="image.id" v-bind:class="{ active: image.id == currentActiveImage }" :ref="'thumbnail'+image.id" :id="'thumbnail'+image.id" :href="'#'+image.id">
                                    <img :src="'/assets/images/'+image.image_path" alt="Product thumb"></a>
                                <a class="product-gallery-thumblist-item video-item" href="https://www.youtube.com/watch?v=1vrXpMLLK14">
                                <div class="product-gallery-thumblist-item-text"><i class="ci-video"></i>Video</div></a>
                            </div>
                        </div>
                    </div>
                    <!-- Product details-->
                    <div class="col-lg-5 pt-4 pt-lg-0">
                        <div class="product-details ms-auto pb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2"><a href="#reviews" data-scroll>
                                <div class="star-rating">
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating > 0 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating > 0 }]"></i>
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating >= 1 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating >= 1 }]"></i>
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating >= 2 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating >= 2 }]"></i>
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating >= 3 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating >= 3 }]"></i>
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating >= 4 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating >= 4 }]"></i>
                                </div>
                                <span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">{{ product.rating.total_reviews }} Reviews</span></a>
                                <button class="btn-wishlist me-0 me-lg-n3" type="button" data-bs-toggle="tooltip" title="Add to wishlist"><i class="ci-heart"></i></button>
                            </div>
                            <div v-if="product.on_sale" class="mb-3"><span class="h3 fw-normal text-accent me-1">${{ product.discounted_price }}</span>
                                <del class="text-muted fs-lg me-3">${{ product.price }}</del><span class="badge bg-danger badge-shadow align-middle mt-n2">Sale</span>
                            </div>
                            <div class="mb-grid-gutter">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center pb-1">
                                        <label class="form-label" for="product-size">Size:</label><a class="nav-link-style fs-sm" @click="showSizeChart = true" data-bs-toggle="modal"><i class="ci-ruler lead align-middle me-1 mt-n1"></i>Size guide</a>
                                    </div>
                                    <select v-model="productSize" class="form-select" required id="product-size">
                                        <option value="">Select size</option>
                                        <option value="xs">XS</option>
                                        <option value="s">S</option>
                                        <option value="m">M</option>
                                        <option value="l">L</option>
                                        <option value="xl">XL</option>
                                    </select>
                                </div>
                                <div class="mb-3 d-flex align-items-center">
                                    <button class="btn btn-primary btn-shadow d-block w-100" @click="addToCart(product, productSize)"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                                </div>
                            </div>
                            <!-- Product panels-->
                            <div class="accordion mb-4" id="productPanels">
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button" href="#productInfo" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="productInfo"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</a></h3>
                                    <div class="accordion-collapse collapse show" id="productInfo" data-bs-parent="#productPanels">
                                        <div class="accordion-body">
                                            <h6 class="fs-sm mb-2">Composition</h6>
                                            <ul class="fs-sm ps-4">
                                                <li>Elastic rib: Cotton 95%, Elastane 5%</li>
                                                <li>Lining: Cotton 100%</li>
                                                <li>Cotton 80%, Polyester 20%</li>
                                            </ul>
                                            <h6 >Art. No.</h6>
                                            <ul class="fs-sm ps-4 mb-0">
                                                <li>183260098</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#shippingOptions" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions"><i class="ci-delivery text-muted lead align-middle mt-n1 me-2"></i>Shipping options</a></h3>
                                    <div class="accordion-collapse collapse" id="shippingOptions" data-bs-parent="#productPanels">
                                        <div class="accordion-body fs-sm">
                                            <div class="d-flex justify-content-between border-bottom pb-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Courier</div>
                                                    <div class="fs-sm text-muted">2 - 4 days</div>
                                                </div>
                                                <div>$26.50</div>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Local shipping</div>
                                                    <div class="fs-sm text-muted">up to one week</div>
                                                </div>
                                                <div>$10.00</div>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Flat rate</div>
                                                    <div class="fs-sm text-muted">5 - 7 days</div>
                                                </div>
                                                <div>$33.85</div>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">UPS ground shipping</div>
                                                    <div class="fs-sm text-muted">4 - 6 days</div>
                                                </div>
                                                <div>$18.00</div>
                                            </div>
                                            <div class="d-flex justify-content-between pt-2">
                                                <div>
                                                    <div class="fw-semibold text-dark">Local pickup from store</div>
                                                    <div class="fs-sm text-muted">&mdash;</div>
                                                </div>
                                                <div>$0.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#localStore" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="localStore"><i class="ci-location text-muted fs-lg align-middle mt-n1 me-2"></i>Find in local store</a></h3>
                                    <div class="accordion-collapse collapse" id="localStore" data-bs-parent="#productPanels">
                                        <div class="accordion-body">
                                            <select class="form-select">
                                                <option value>Select your country</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="France">France</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Spain">Spain</option>
                                                <option value="UK">United Kingdom</option>
                                                <option value="USA">USA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sharing-->
                            <label class="form-label d-inline-block align-middle my-2 me-3">Share:</label><a class="btn-share btn-twitter me-2 my-2" href="#"><i class="ci-twitter"></i>Twitter</a><a class="btn-share btn-instagram me-2 my-2" href="#"><i class="ci-instagram"></i>Instagram</a><a class="btn-share btn-facebook my-2" href="#"><i class="ci-facebook"></i>Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SizeChartModal from "../SizeChartModal/sizeChartModal";
export default {
    name: "productDetails",
    components: {SizeChartModal},
    data() {
        return {
            product: null,
            isProductReady:false,
            currentActiveImage:1,
            productQuantity:1,
            showSizeChart: false,
            productSize:''
        }
    },
    created() {
    },
    watch: {
        '$route.params.product_id': {
            handler: function(productId) {
                if(productId != null ||productId != '') {
                    this.loadProduct();
                    this.currentActiveImage = window.location.hash.substr(1);
                }
            },
            deep: true,
            immediate: true
        }
    },
    methods: {
        loadProduct() {
            let loader = this.$loading.show();
            axios.get('http://127.0.0.1:8999/api/product-detail', {
                params: {
                    product_id:this.$route.params.product_id,
                }
            }).then(response => {
                this.product = response.data.data;
                this.isProductReady =  true;
                loader.hide();
            }).catch(error => {
                loader.hide();
                this.$toast.error('oops an error occurred');
            });
        },

        addToCart(item  , size)
        {
            if(this.productSize === '' || this.productSize === null){
                this.$toast.error('please Choose Size First');
                return false;
            }
            this.$store.commit('addToCart', {item, size});
            this.productSize = '';

        },



    },
}
</script>

<style scoped>

</style>
