<template>
    <main>
        <size-chart-modal
            v-if="showSizeChart"
            @closeChart="showSizeChart = false"
        />
        <!-- Page Title-->
        <div class="page-title-overlap bg-dark pt-4">
            <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
                <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a>
                            </li>
                            <li class="breadcrumb-item text-nowrap"><a href="shop-grid-ls.html">Shop</a>
                            </li>
                            <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
                <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                    <h1 class="h3 text-light mb-0">Your cart</h1>
                </div>
            </div>
        </div>
        <div class="container pb-5 mb-2 mb-md-4">
            <div class="row">
                <!-- List of items-->
                <section class="col-lg-8">
                    <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                        <h2 class="h6 text-light mb-0">Products</h2><router-link :to="{name:'Shop', params:{}}" class="btn btn-outline-primary btn-sm ps-2"
                                                                       ><i
                        class="ci-arrow-left me-2"></i>Continue shopping</router-link>
                    </div>
                    <!-- Item-->
                    <div v-for="item in $store.state.cart"
                         class="d-sm-flex justify-content-between align-items-center my-2 pb-3 border-bottom">
                        <div class="d-block d-sm-flex align-items-center text-center text-sm-start"><a
                            class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="shop-single-v1.html"><img
                            :src="'img/shop/catalog/'+item.image" width="160" alt="Product"></a>
                            <div class="pt-2">
                                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">{{ item.name }}</a>
                                </h3>
                                <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>
                                <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue</div>
                                <div class="fs-lg text-accent pt-2">${{ item.price }}<small></small></div>
                            </div>
                        </div>
                        <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start"
                             style="max-width: 9rem;">
                            <label class="form-label" for="quantity1">Quantity</label>
                            <input class="form-control" disabled readonly type="number" id="quantity1" min="1" @input="updateQuantity($event, item)" :value="item.quantity">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center pb-1">
                                    <label class="form-label">Size:</label><a class="nav-link-style fs-sm" @click="showSizeChart = true" data-bs-toggle="modal"><i class="ci-ruler lead align-middle me-1 mt-n1"></i>Size guide</a>
                                </div>
                                    <button v-for="(size, index) in item.orderedSizes" :key="index"
                                            @click.prevent="removeSize(item, size)" class="btn padding-0 btn-link px-0 text-danger"
                                            type="button"><i
                                        class="ci-close-circle me-2"></i><span class="fs-sm">{{ getSize(size) }}</span>
                                    </button>
<!--                                <select @change="updateSize($event, item)" v-model="item.size" class="form-select" required id="product-size">-->
<!--                                    <option value="">Select size</option>-->
<!--                                    <option value="xs">XS</option>-->
<!--                                    <option value="s">S</option>-->
<!--                                    <option value="m">M</option>-->
<!--                                    <option value="l">L</option>-->
<!--                                    <option value="xl">XL</option>-->
<!--                                </select>-->
                            </div>
                            <button @click.prevent="removeFromCart(item)" class="btn btn-link px-0 text-danger" type="button"><i
                                class="ci-close-circle me-2"></i><span class="fs-sm">Remove From Cart</span>
                            </button>
                        </div>
                    </div>
                    <button v-if="false" class="btn btn-outline-accent d-block w-100 mt-4" type="button"><i
                        class="ci-loading fs-base me-2"></i>Update cart
                    </button>
                    <router-link :to="{name:'check-out', params:{}}" class="btn btn-outline-accent d-block w-100 mt-4" type="button"><i
                        class="ci-loading fs-base me-2"></i>Proceed To Checkout
                    </router-link>
                </section>
                <!-- Sidebar-->
                <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                    <div class="bg-white rounded-3 shadow-lg p-4">
                        <div class="py-2 px-xl-2">
                            <div class="text-center mb-4 pb-3 border-bottom">
                                <h2 class="h6 mb-3 pb-1">Subtotal</h2>
                                <h3 class="fw-normal">${{ $store.state.cartTotal.toFixed(2) }}<small></small></h3>
                            </div>
                            <div class="mb-3 mb-4">
                                <label class="form-label mb-3" for="order-comments"><span
                                    class="badge bg-info fs-xs me-2">Note</span><span class="fw-medium">Additional comments</span></label>
                                <textarea class="form-control" rows="6" id="order-comments"></textarea>
                            </div>
                            <div class="accordion" v-if="false" id="order-options">
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button" href="#promo-code"
                                                                    role="button" data-bs-toggle="collapse"
                                                                    aria-expanded="true" aria-controls="promo-code">Apply
                                        promo code</a></h3>
                                    <div class="accordion-collapse collapse show" id="promo-code"
                                         data-bs-parent="#order-options">
                                        <form class="accordion-body needs-validation" method="post" novalidate>
                                            <div class="mb-3">
                                                <input class="form-control" type="text" placeholder="Promo code"
                                                       required>
                                                <div class="invalid-feedback">Please provide promo code.</div>
                                            </div>
                                            <button class="btn btn-outline-primary d-block w-100" type="submit">Apply
                                                promo code
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header"><a class="accordion-button collapsed"
                                                                    href="#shipping-estimates" role="button"
                                                                    data-bs-toggle="collapse" aria-expanded="true"
                                                                    aria-controls="shipping-estimates">Shipping
                                        estimates</a></h3>
                                    <div class="accordion-collapse collapse" id="shipping-estimates"
                                         data-bs-parent="#order-options">
                                        <div class="accordion-body">
                                            <form class="needs-validation" novalidate>
                                                <div class="mb-3">
                                                    <select class="form-select" required>
                                                        <option value="">Choose your country</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="United States">United States</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please choose your country!</div>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" required>
                                                        <option value="">Choose your city</option>
                                                        <option value="Bern">Bern</option>
                                                        <option value="Brussels">Brussels</option>
                                                        <option value="Canberra">Canberra</option>
                                                        <option value="Helsinki">Helsinki</option>
                                                        <option value="Mexico City">Mexico City</option>
                                                        <option value="Ottawa">Ottawa</option>
                                                        <option value="Washington D.C.">Washington D.C.</option>
                                                        <option value="Wellington">Wellington</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please choose your city!</div>
                                                </div>
                                                <div class="mb-3">
                                                    <input class="form-control" type="text"
                                                           placeholder="ZIP / Postal code" required>
                                                    <div class="invalid-feedback">Please provide a valid zip!</div>
                                                </div>
                                                <button class="btn btn-outline-primary d-block w-100" type="submit">
                                                    Calculate shipping
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <router-link :to="{name:'check-out', params:{}}" class="btn btn-primary btn-shadow d-block w-100 mt-4" ><i
                                class="ci-card fs-lg me-2"></i>Proceed to Checkout</router-link>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>
</template>

<script>
import SizeChartModal from "../SizeChartModal/sizeChartModal";
export default {
    name: "shopCartDetails",
    components: {SizeChartModal},
    data(){
        return {
            showSizeChart : false,
        }
    },
    methods: {
        removeFromCart(item) {
            this.$store.commit('removeFromCart', item);
        },
        updateQuantity(event, item) {
            this.$store.commit('updateQuantity', {item, event});
        },
        updateSize(event, item) {
            this.$store.commit('updateSize', {item, event});
        },
        getSize (size) {
            if(size == 'm'){
                return 'Medium';
            }
            if(size == 's') {
                return 'Small';
            }
            if(size == 'xs') {
                return 'Extra Small';
            }
            if(size == 'l'){
                return 'Large';
            }
            if(size == 'xl') {
                return 'Extra Large';
            }

        },
        removeSize(item, size) {
            this.$store.commit('removeOrderedSize', {item, size});
        }
    },
}
</script>

<style scoped>
.padding-0{
    padding: 0px !important;
}
</style>
