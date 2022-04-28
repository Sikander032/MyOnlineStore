<template>
    <div v-if="isResponseReady" class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!-- Sidebar-->
            <aside class="col-lg-2">
                <!-- Sidebar-->
<!--                <div class="offcanvas offcanvas-collapse bg-white w-100 rounded-3 shadow-lg py-1" id="shop-sidebar"-->
<!--                     style="max-width: 22rem;">-->
<!--                    <div class="offcanvas-header align-items-center shadow-sm">-->
<!--                        <h2 class="h5 mb-0">Filters</h2>-->
<!--                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas"-->
<!--                                aria-label="Close"></button>-->
<!--                    </div>-->
<!--                    <div class="offcanvas-body py-grid-gutter px-lg-grid-gutter">-->
<!--                        &lt;!&ndash; Categories&ndash;&gt;-->
<!--                        <div class="widget widget-categories mb-4 pb-4 border-bottom">-->
<!--                            <h3 class="widget-title">Categories</h3>-->
<!--                            <div class="accordion mt-n1" id="shop-categories">-->
<!--                                &lt;!&ndash; Shoes&ndash;&gt;-->
<!--                                <div class="accordion-item">-->
<!--                                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#shoes"-->
<!--                                                                    role="button" data-bs-toggle="collapse"-->
<!--                                                                    aria-expanded="false"-->
<!--                                                                    aria-controls="shoes">Shoes</a></h3>-->
<!--                                    <div class="accordion-collapse collapse" id="shoes"-->
<!--                                         data-bs-parent="#shop-categories">-->
<!--                                        <div class="accordion-body">-->
<!--                                            <div class="widget widget-links widget-filter">-->
<!--                                                <div class="input-group input-group-sm mb-2">-->
<!--                                                    <input class="widget-filter-search form-control rounded-end"-->
<!--                                                           type="text" placeholder="Search"><i-->
<!--                                                    class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>-->
<!--                                                </div>-->
<!--                                                <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;"-->
<!--                                                    data-simplebar data-simplebar-auto-hide="false">-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">View all</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">1,953</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Pumps &amp; High Heels</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">247</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Ballerinas &amp; Flats</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">156</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Sandals</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">310</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Sneakers</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">402</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Boots</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">393</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Ankle Boots</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">50</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Loafers</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">93</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Slip-on</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">122</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Flip Flops</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">116</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Clogs &amp; Mules</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">24</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Athletic Shoes</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">31</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Oxfords</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">9</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Smart Shoes</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">18</span></a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                &lt;!&ndash; Clothing&ndash;&gt;-->
<!--                                <div class="accordion-item">-->
<!--                                    <h3 class="accordion-header"><a class="accordion-button" href="#clothing"-->
<!--                                                                    role="button" data-bs-toggle="collapse"-->
<!--                                                                    aria-expanded="true" aria-controls="clothing">Clothing</a>-->
<!--                                    </h3>-->
<!--                                    <div class="accordion-collapse collapse show" id="clothing"-->
<!--                                         data-bs-parent="#shop-categories">-->
<!--                                        <div class="accordion-body">-->
<!--                                            <div class="widget widget-links widget-filter">-->
<!--                                                <div class="input-group input-group-sm mb-2">-->
<!--                                                    <input class="widget-filter-search form-control rounded-end"-->
<!--                                                           type="text" placeholder="Search"><i-->
<!--                                                    class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>-->
<!--                                                </div>-->
<!--                                                <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;"-->
<!--                                                    data-simplebar data-simplebar-auto-hide="false">-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">View all</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">2,548</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Blazers &amp; Suits</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">235</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Blouses</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">410</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Cardigans &amp; Jumpers</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">107</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Dresses</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">93</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Hoodie &amp; Sweatshirts</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">122</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Jackets &amp; Coats</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">116</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Jeans</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">215</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Lingerie</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">150</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Maternity Wear</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">8</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Nightwear</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">26</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Shirts</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">164</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Shorts</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">147</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Socks &amp; Tights</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">139</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Sportswear</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">65</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Swimwear</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">18</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">T-shirts &amp; Vests</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">209</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Tops</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">132</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Trousers</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">105</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Underwear</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">87</span></a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                &lt;!&ndash; Bags&ndash;&gt;-->
<!--                                <div class="accordion-item">-->
<!--                                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#bags"-->
<!--                                                                    role="button" data-bs-toggle="collapse"-->
<!--                                                                    aria-expanded="false" aria-controls="bags">Bags</a>-->
<!--                                    </h3>-->
<!--                                    <div class="accordion-collapse collapse" id="bags"-->
<!--                                         data-bs-parent="#shop-categories">-->
<!--                                        <div class="accordion-body">-->
<!--                                            <div class="widget widget-links widget-filter">-->
<!--                                                <div class="input-group input-group-sm mb-2">-->
<!--                                                    <input class="widget-filter-search form-control rounded-end"-->
<!--                                                           type="text" placeholder="Search"><i-->
<!--                                                    class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>-->
<!--                                                </div>-->
<!--                                                <ul class="widget-list widget-filter-list pt-1" style="height: 12rem;"-->
<!--                                                    data-simplebar data-simplebar-auto-hide="false">-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">View all</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">801</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Handbags</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">238</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Backpacks</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">116</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Wallets</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">104</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Luggage</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">115</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Lumbar Packs</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">17</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Duffle Bags</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">9</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Bag / Travel Accessories</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">93</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Diaper Bags</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">5</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Lunch Bags</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">8</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Messenger Bags</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">2</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span-->
<!--                                                        class="widget-filter-item-text">Laptop Bags</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">31</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Briefcases</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">45</span></a></li>-->
<!--                                                    <li class="widget-list-item widget-filter-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span class="widget-filter-item-text">Sport Bags</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">18</span></a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                &lt;!&ndash; Sunglasses&ndash;&gt;-->
<!--                                <div class="accordion-item">-->
<!--                                    <h3 class="accordion-header"><a class="accordion-button collapsed"-->
<!--                                                                    href="#sunglasses" role="button"-->
<!--                                                                    data-bs-toggle="collapse" aria-expanded="false"-->
<!--                                                                    aria-controls="sunglasses">Sunglasses</a></h3>-->
<!--                                    <div class="collapse" id="sunglasses" data-bs-parent="#shop-categories">-->
<!--                                        <div class="accordion-body">-->
<!--                                            <div class="widget widget-links">-->
<!--                                                <ul class="widget-list">-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>View all</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">1,842</span></a></li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Fashion Sunglasses</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">953</span></a></li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Sport Sunglasses</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">589</span></a></li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Classic Sunglasses</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">300</span></a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                &lt;!&ndash; Watches&ndash;&gt;-->
<!--                                <div class="accordion-item">-->
<!--                                    <h3 class="accordion-header"><a class="accordion-button collapsed" href="#watches"-->
<!--                                                                    role="button" data-bs-toggle="collapse"-->
<!--                                                                    aria-expanded="false" aria-controls="watches">Watches</a>-->
<!--                                    </h3>-->
<!--                                    <div class="accordion-collapse collapse" id="watches"-->
<!--                                         data-bs-parent="#shop-categories">-->
<!--                                        <div class="accordion-body">-->
<!--                                            <div class="widget widget-links">-->
<!--                                                <ul class="widget-list">-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>View all</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">734</span></a></li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Fashion Watches</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">572</span></a></li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Casual Watches</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">110</span></a></li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Luxury Watches</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">34</span></a></li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Sport Watches</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">18</span></a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                &lt;!&ndash; Accessories&ndash;&gt;-->
<!--                                <div class="accordion-item">-->
<!--                                    <h3 class="accordion-header"><a class="accordion-button collapsed"-->
<!--                                                                    href="#accessories" role="button"-->
<!--                                                                    data-bs-toggle="collapse" aria-expanded="false"-->
<!--                                                                    aria-controls="accessories">Accessories</a></h3>-->
<!--                                    <div class="accordion-collapse collapse" id="accessories"-->
<!--                                         data-bs-parent="#shop-categories">-->
<!--                                        <div class="accordion-body">-->
<!--                                            <div class="widget widget-links">-->
<!--                                                <ul class="widget-list">-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>View all</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">920</span></a></li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Belts</span><span class="fs-xs text-muted ms-3">364</span></a>-->
<!--                                                    </li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Hats</span><span class="fs-xs text-muted ms-3">405</span></a>-->
<!--                                                    </li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Jewelry</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">131</span></a></li>-->
<!--                                                    <li class="widget-list-item"><a-->
<!--                                                        class="widget-list-link d-flex justify-content-between align-items-center"-->
<!--                                                        href="#"><span>Cosmetics</span><span-->
<!--                                                        class="fs-xs text-muted ms-3">20</span></a></li>-->
<!--                                                </ul>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        &lt;!&ndash; Price range&ndash;&gt;-->
<!--                        <div class="widget mb-4 pb-4 border-bottom">-->
<!--                            <h3 class="widget-title">Price</h3>-->
<!--                            <div class="range-slider" data-start-min="250" data-start-max="680" data-min="0"-->
<!--                                 data-max="1000" data-step="1">-->
<!--                                <div class="range-slider-ui"></div>-->
<!--                                <div class="d-flex pb-1">-->
<!--                                    <div class="w-50 pe-2 me-2">-->
<!--                                        <div class="input-group input-group-sm"><span class="input-group-text">$</span>-->
<!--                                            <input class="form-control range-slider-value-min" type="text">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="w-50 ps-2">-->
<!--                                        <div class="input-group input-group-sm"><span class="input-group-text">$</span>-->
<!--                                            <input class="form-control range-slider-value-max" type="text">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        &lt;!&ndash; Filter by Brand&ndash;&gt;-->
<!--                        <div class="widget widget-filter mb-4 pb-4 border-bottom">-->
<!--                            <h3 class="widget-title">Brand</h3>-->
<!--                            <div class="input-group input-group-sm mb-2">-->
<!--                                <input class="widget-filter-search form-control rounded-end pe-5" type="text"-->
<!--                                       placeholder="Search"><i-->
<!--                                class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>-->
<!--                            </div>-->
<!--                            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;"-->
<!--                                data-simplebar data-simplebar-auto-hide="false">-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="adidas">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="adidas">Adidas</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">425</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="ataylor">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="ataylor">Ann-->
<!--                                            Taylor</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">15</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="armani">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="armani">Armani</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">18</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="banana">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="banana">Banana-->
<!--                                            Republic</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">103</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="bilabong">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="bilabong">Bilabong</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">27</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="birkenstock">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="birkenstock">Birkenstock</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">10</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="klein">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="klein">Calvin-->
<!--                                            Klein</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">365</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="columbia">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="columbia">Columbia</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">508</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="converse">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="converse">Converse</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">176</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="dockers">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="dockers">Dockers</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">54</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="fruit">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="fruit">Fruit of the-->
<!--                                            Loom</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">739</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="hanes">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="hanes">Hanes</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">92</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="choo">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="choo">Jimmy-->
<!--                                            Choo</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">17</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="levis">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="levis">Levi's</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">361</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="lee">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="lee">Lee</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">264</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="wearhouse">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="wearhouse">Men's-->
<!--                                            Wearhouse</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">75</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="newbalance">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="newbalance">New-->
<!--                                            Balance</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">218</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="nike">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="nike">Nike</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">810</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="navy">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="navy">Old-->
<!--                                            Navy</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">147</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="polo">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="polo">Polo Ralph-->
<!--                                            Lauren</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">64</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="puma">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="puma">Puma</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">370</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="reebok">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="reebok">Reebok</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">506</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="skechers">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="skechers">Skechers</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">209</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="hilfiger">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="hilfiger">Tommy-->
<!--                                            Hilfiger</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">487</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="armour">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="armour">Under-->
<!--                                            Armour</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">90</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="urban">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="urban">Urban-->
<!--                                            Outfitters</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">152</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="vsecret">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="vsecret">Victoria's-->
<!--                                            Secret</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">238</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="wolverine">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="wolverine">Wolverine</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">29</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="wrangler">-->
<!--                                        <label class="form-check-label widget-filter-item-text"-->
<!--                                               for="wrangler">Wrangler</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">115</span>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        &lt;!&ndash; Filter by Size&ndash;&gt;-->
<!--                        <div class="widget widget-filter mb-4 pb-4 border-bottom">-->
<!--                            <h3 class="widget-title">Size</h3>-->
<!--                            <div class="input-group input-group-sm mb-2">-->
<!--                                <input class="widget-filter-search form-control rounded-end pe-5" type="text"-->
<!--                                       placeholder="Search"><i-->
<!--                                class="ci-search position-absolute top-50 end-0 translate-middle-y fs-sm me-3"></i>-->
<!--                            </div>-->
<!--                            <ul class="widget-list widget-filter-list list-unstyled pt-1" style="max-height: 11rem;"-->
<!--                                data-simplebar data-simplebar-auto-hide="false">-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-xs">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-xs">XS</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">34</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-s">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-s">S</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">57</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-m">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-m">M</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">198</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-l">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-l">L</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">72</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-xl">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-xl">XL</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">46</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-39">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-39">39</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">112</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-40">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-40">40</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">85</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-41">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-40">41</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">210</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-42">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-42">42</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">57</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-43">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-43">43</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">30</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-44">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-44">44</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">61</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-45">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-45">45</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">23</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-46">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-46">46</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">19</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-47">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-47">47</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">15</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-48">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-48">48</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">12</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-49">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-49">49</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">8</span>-->
<!--                                </li>-->
<!--                                <li class="widget-filter-item d-flex justify-content-between align-items-center">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="checkbox" id="size-50">-->
<!--                                        <label class="form-check-label widget-filter-item-text" for="size-50">50</label>-->
<!--                                    </div>-->
<!--                                    <span class="fs-xs text-muted">6</span>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                        &lt;!&ndash; Filter by Color&ndash;&gt;-->
<!--                        <div class="widget">-->
<!--                            <h3 class="widget-title">Color</h3>-->
<!--                            <div class="d-flex flex-wrap">-->
<!--                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">-->
<!--                                    <input class="form-check-input" type="checkbox" id="color-blue-gray">-->
<!--                                    <label class="form-option-label rounded-circle" for="color-blue-gray"><span-->
<!--                                        class="form-option-color rounded-circle"-->
<!--                                        style="background-color: #b3c8db;"></span></label>-->
<!--                                    <label class="d-block fs-xs text-muted mt-n1"-->
<!--                                           for="color-blue-gray">Blue-gray</label>-->
<!--                                </div>-->
<!--                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">-->
<!--                                    <input class="form-check-input" type="checkbox" id="color-burgundy">-->
<!--                                    <label class="form-option-label rounded-circle" for="color-burgundy"><span-->
<!--                                        class="form-option-color rounded-circle"-->
<!--                                        style="background-color: #ca7295;"></span></label>-->
<!--                                    <label class="d-block fs-xs text-muted mt-n1" for="color-burgundy">Burgundy</label>-->
<!--                                </div>-->
<!--                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">-->
<!--                                    <input class="form-check-input" type="checkbox" id="color-teal">-->
<!--                                    <label class="form-option-label rounded-circle" for="color-teal"><span-->
<!--                                        class="form-option-color rounded-circle"-->
<!--                                        style="background-color: #91c2c3;"></span></label>-->
<!--                                    <label class="d-block fs-xs text-muted mt-n1" for="color-teal">Teal</label>-->
<!--                                </div>-->
<!--                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">-->
<!--                                    <input class="form-check-input" type="checkbox" id="color-brown">-->
<!--                                    <label class="form-option-label rounded-circle" for="color-brown"><span-->
<!--                                        class="form-option-color rounded-circle"-->
<!--                                        style="background-color: #9a8480;"></span></label>-->
<!--                                    <label class="d-block fs-xs text-muted mt-n1" for="color-brown">Brown</label>-->
<!--                                </div>-->
<!--                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">-->
<!--                                    <input class="form-check-input" type="checkbox" id="color-coral-red">-->
<!--                                    <label class="form-option-label rounded-circle" for="color-coral-red"><span-->
<!--                                        class="form-option-color rounded-circle"-->
<!--                                        style="background-color: #ff7072;"></span></label>-->
<!--                                    <label class="d-block fs-xs text-muted mt-n1" for="color-coral-red">Coral-->
<!--                                        red</label>-->
<!--                                </div>-->
<!--                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">-->
<!--                                    <input class="form-check-input" type="checkbox" id="color-navy">-->
<!--                                    <label class="form-option-label rounded-circle" for="color-navy"><span-->
<!--                                        class="form-option-color rounded-circle"-->
<!--                                        style="background-color: #696dc8;"></span></label>-->
<!--                                    <label class="d-block fs-xs text-muted mt-n1" for="color-navy">Navy</label>-->
<!--                                </div>-->
<!--                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">-->
<!--                                    <input class="form-check-input" type="checkbox" id="color-charcoal">-->
<!--                                    <label class="form-option-label rounded-circle" for="color-charcoal"><span-->
<!--                                        class="form-option-color rounded-circle"-->
<!--                                        style="background-color: #4e4d4d;"></span></label>-->
<!--                                    <label class="d-block fs-xs text-muted mt-n1" for="color-charcoal">Charcoal</label>-->
<!--                                </div>-->
<!--                                <div class="form-check form-option text-center mb-2 mx-1" style="width: 4rem;">-->
<!--                                    <input class="form-check-input" type="checkbox" id="color-sky-blue">-->
<!--                                    <label class="form-option-label rounded-circle" for="color-sky-blue"><span-->
<!--                                        class="form-option-color rounded-circle"-->
<!--                                        style="background-color: #8bcdf5;"></span></label>-->
<!--                                    <label class="d-block fs-xs text-muted mt-n1" for="color-sky-blue">Sky blue</label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </aside>
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div
                    class="d-flex justify-content-center justify-content-sm-between align-items-center pt-2 pb-4 pb-sm-5">
                    <div class="d-flex flex-wrap">
                        <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4 pb-3">
                            <label class="text-light opacity-75 text-nowrap fs-sm me-2 d-none d-sm-block" for="sorting">Sort
                                by:</label>
                            <select @change="loadProducts($event)" class="form-select" name="sorting" id="sorting">
                                <option>Popularity</option>
                                <option value="ascendingPrice">Low - Hight Price</option>
                                <option value="descendingPrice">High - Low Price</option>
                                <option value="averge-rating">Average Rating</option>
                                <option value="a-z">A - Z Order</option>
                                <option value="z-a">Z - A Order</option>
                            </select><span class="fs-sm text-light opacity-75 text-nowrap ms-2 d-none d-md-block">of {{ products.length }} products</span>
                        </div>
                    </div>
                    <div  class="d-flex pb-3"><a class="nav-link-style nav-link-light me-3" href="#"><i v-if="page != 1" @click="loadPreviousProducts()"
                        class="ci-arrow-left"></i></a><span class="fs-md text-light">{{ page }} / {{ lastPage }}</span><a
                        class="nav-link-style nav-link-light ms-3" href="#"><i v-if="pages.has_more" @click="loadMoreProducts()" class="ci-arrow-right"></i></a></div>
                </div>
                <!-- Products grid-->
                <div class="row mx-n2">
                    <!-- Product-->
                    <div v-if="products.length > 0" v-for="product in products" :key="product.id"
                         :id="'div'+product.id"  class="col-md-4 col-sm-6 px-2 mb-4">
                        <quick-vue-modal :product=product></quick-vue-modal>
                        <div class="card product-card"><span class="badge bg-danger badge-shadow">Sale</span>
                            <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Add to wishlist"><i class="ci-heart"></i></button>
                            <router-link :to="{name: 'product-details', params:{ product_id: product.id}}" class="card-img-top d-block overflow-hidden"><img
                                :src="'/img/shop/catalog/'+product.image" alt="Product"></router-link>
                            <router-link :to="{name: 'product-details', params:{ product_id: product.id}}" class="card-body py-2"><a class="product-meta d-block fs-xs pb-1"
                                                           >{{ product.category_name }}</a>
                                <h3 class="product-title fs-sm">
                                    <router-link :to="{name: 'product-details', params:{ product_id: product.id}}">{{ product.name }}</router-link>
                                </h3>
                                <div class="d-flex justify-content-between">
                                    <div class="product-price">
                                        <span class="text-accent">${{product.price }}<small></small>
                                        </span>
                                    </div>
                                    <div class="star-rating">
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating > 0 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating > 0 }]"></i>
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating >= 1 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating >= 1 }]"></i>
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating >= 2 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating >= 2 }]"></i>
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating >= 3 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating >= 3 }]"></i>
                                        <i class="star-rating-icon" v-bind:class="[ product.rating.overall_rating >= 4 ? 'ci-star-filled': 'ci-star' , { active : product.rating.overall_rating >= 4 }]"></i>
                                    </div>
                                </div>
                            </router-link>
                            <div class="card-body card-body-hidden">
<!--                                <div class="text-center pb-2">-->
<!--                                    <div class="form-check form-option form-check-inline mb-2">-->
<!--                                        <input class="form-check-input" type="radio" name="size1" value="s" v-model="productSize"  @change="onChange($event)" id="s-75">-->
<!--                                        <label class="form-option-label" for="s-75">Small</label>-->
<!--                                    </div>-->
<!--                                    <div class="form-check form-option form-check-inline mb-2">-->
<!--                                        <input class="form-check-input" type="radio" name="size1" value="m" v-model="productSize" @change="onChange($event)" id="s-80" checked>-->
<!--                                        <label class="form-option-label" for="s-80">Medium</label>-->
<!--                                    </div>-->
<!--                                    <div class="form-check form-option form-check-inline mb-2">-->
<!--                                        <input class="form-check-input" type="radio" name="size1" value="l" v-model="productSize" @change="onChange($event)" id="s-85">-->
<!--                                        <label class="form-option-label" for="s-85">Large</label>-->
<!--                                    </div>-->
<!--                                    <div class="form-check form-option form-check-inline mb-2">-->
<!--                                        <input class="form-check-input" type="radio" name="size1" value="xl" v-model="productSize" @change="onChange($event)" id="s-90">-->
<!--                                        <label class="form-option-label" for="s-90">Extra Large</label>-->
<!--                                    </div>-->
<!--                                </div>-->
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
<!--                                <div class="text-center"><a class="nav-link-style fs-ms" :href="'#quick-view'+product.id"-->
<!--                                                            data-bs-toggle="modal"><i-->
<!--                                    class="ci-eye align-middle me-1"></i>Quick view</a>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <hr class="d-sm-none">
                    </div>
                </div>
                <!-- Banner-->
                <div class="py-sm-2">
                    <div
                        class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden mb-4 rounded-3">
                        <div class="py-4 my-2 my-md-0 py-md-5 px-4 ms-md-3 text-center text-sm-start">
                            <h4 class="fs-lg fw-light mb-2">Converse All Star</h4>
                            <h3 class="mb-4">Make Your Day Comfortable</h3><a class="btn btn-primary btn-shadow btn-sm"
                                                                              >Shop Now</a>
                        </div>
                        <img class="d-block ms-auto" src="/assets/images/banner-conver.jpg" alt="Shop Converse">
                    </div>
                </div>
                <!-- Products grid-->
                <div class="row mx-n2">

                </div>
                <hr class="my-3">
                <!-- Pagination-->
                <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination">
                        <li v-if="page != 1" class="page-item"><a @click="loadPreviousProducts()" class="page-link"><i
                            class="ci-arrow-left me-2"></i>Prev</a>
                        </li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item d-sm-none"><span class="page-link page-link-static">{{ page }} / {{ lastPage }}</span></li>
                        <li v-for="(value, pageNumber, index) in pageNumbers" @click="loadPageNumber(value)"
                            class="page-item d-none d-sm-block" v-bind:class="{ active: value == page }"
                            aria-current="page"><span
                            class="page-link">{{ value }}<span class="visually-hidden">(current)</span></span></li>
                    </ul>
                    <ul class="pagination">
                        <li v-if="pages.has_more" class="page-item"><a @click="loadMoreProducts()" class="page-link"
                                                                       aria-label="Next">Next<i
                            class="ci-arrow-right ms-2"></i></a></li>
                    </ul>
                </nav>
            </section>
        </div>
    </div>
</template>

<script>
import QuickVueModal from "./quickVueModal";
export default {
    name: "mainproducts.vue",
    components: {QuickVueModal},
    data() {
        return {
            products: [],
            pages: [],
            page: 1,
            pageNumbers: [],
            lastPage: '',
            noOfProducts: '',
            department:this.$route.params.department,
            isResponseReady:false,
            productSize: ''
        }
    },
    computed: {},
    created() {
        this.loadProducts();
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
        loadProducts(event = null) {
            let sorting = event ? event.target.value : '';
            let loader = this.$loading.show();
            let self = this;
            axios.get(this.BaseUrl + '/api/products', {
                params: {
                    page: this.page,
                    department_id:this.$route.params.department,
                    search:this.$route.query.search,
                    sort_by: sorting
                }
            }).then(function (response) {
                self.products = response.data.products;
                self.pages = response.data.pagination;
                self.lastPage = response.data.pagination.last_page;
                self.noOfProducts = response.data.products_count;
                // create pagination
                var i = 0;
                var pagesArray = [];
                var startPage = 1;
                for (i = 0; i < self.lastPage; i++) {
                    pagesArray[i] = startPage;
                    startPage++;
                }
                self.pageNumbers = pagesArray;
                self.isResponseReady = true;
                loader.hide();
            })["catch"](function (error) {
                console.log(error);
                loader.hide();
            });
        },
        loadMoreProducts() {
            let loader = this.$loading.show();
            this.page++;
            let self = this;
            axios.get(this.BaseUrl + '/api/products', {
                params: {
                    page: this.page
                }
            }).then(function (response) {
                self.products = response.data.products;
                self.pages = response.data.pagination;
                self.isResponseReady = true;
                loader.hide();
            })["catch"](function (error) {
                loader.hide();
            });
        },

        loadPreviousProducts() {
            let loader = this.$loading.show();
            this.page--;
            let self = this;
            axios.get(this.BaseUrl + '/api/products', {
                headers: {
                    'X-Authorization': self.api_token
                },
                params: {
                    page: this.page
                }
            }).then(function (response) {
                self.products = response.data.products;
                self.pages = response.data.pagination;
                self.isResponseReady = true;
                loader.hide();
            })["catch"](function (error) {
                loader.hide();
            });
        },

        loadPageNumber(currentPage) {
            let loader = this.$loading.show();
            let self = this;
            this.page = currentPage;
            axios.get(this.BaseUrl + '/api/products', {
                params: {
                    page: this.page
                }
            }).then(function (response) {
                self.products = response.data.products;
                self.pages = response.data.pagination;
                loader.hide();
            })["catch"](function (error) {

                loader.hide();
                console.log(error);
            });
        },

    },
    watch: {
        '$route.params.department': {
            handler: function(departmentId) {
                if(departmentId != null ||departmentId != '') {
                    this.loadProducts();
                }
            },
            deep: true,
            immediate: true
        }
    }

}
</script>

<style scoped>

</style>
