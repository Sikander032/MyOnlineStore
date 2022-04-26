<template>
    <!-- Reviews-->
    <div class="border-top border-bottom my-lg-3 py-5">
        <div class="container pt-md-2" id="reviews">
            <div class="row pb-3">
                <div class="col-lg-4 col-md-5">
                    <h2 class="h3 mb-4">74 Reviews</h2>
                    <div class="star-rating me-2"><i class="ci-star-filled fs-sm text-accent me-1"></i><i class="ci-star-filled fs-sm text-accent me-1"></i><i class="ci-star-filled fs-sm text-accent me-1"></i><i class="ci-star-filled fs-sm text-accent me-1"></i><i class="ci-star fs-sm text-muted me-1"></i></div><span class="d-inline-block align-middle">4.1 Overall rating</span>
                    <p class="pt-3 fs-sm text-muted">58 out of 74 (77%)<br>Customers recommended this product</p>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">5</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><span class="text-muted ms-3">43</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">4</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar" role="progressbar" style="width: 27%; background-color: #a7e453;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><span class="text-muted ms-3">16</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">3</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar" role="progressbar" style="width: 17%; background-color: #ffda75;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><span class="text-muted ms-3">9</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">2</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar" role="progressbar" style="width: 9%; background-color: #fea569;" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><span class="text-muted ms-3">4</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="text-nowrap me-3"><span class="d-inline-block align-middle text-muted">1</span><i class="ci-star-filled fs-xs ms-1"></i></div>
                        <div class="w-100">
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 4%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div><span class="text-muted ms-3">2</span>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <div class="row pt-4">
                <!-- Reviews list-->
                <div class="col-md-7">
                    <div class="d-flex justify-content-end pb-4">
                        <div class="d-flex align-items-center flex-nowrap">
                            <label class="fs-sm text-muted text-nowrap me-2 d-none d-sm-block" for="sort-reviews">Sort by:</label>
                            <select @change="applyRatingFilter($event)" class="form-select form-select-sm" id="sort-reviews">
                                <option value="latest">Newest</option>
                                <option value="oldest">Oldest</option>
                                <option value="popular">Popular</option>
                                <option value="high-rating">High rating</option>
                                <option value="low-rating">Low rating</option>
                            </select>
                        </div>
                    </div>
                    <!-- Review-->
                    <div v-for="review in userReviews" :key="review.id" class="product-review pb-4 mb-4 border-bottom">
                        <div class="d-flex mb-3">
                            <div class="d-flex align-items-center me-4 pe-2">
                                <div class="ps-3">
                                    <h6 class="fs-sm mb-0">{{ review.full_name }}</h6><span class="fs-ms text-muted">{{ review.created_at }}</span>
                                </div>
                            </div>
                            <div>
                                <div class="star-rating">
                                    <i v-for="index in review.rating" class="star-rating-icon ci-star-filled active"></i>
                                    <!-- <i   class="star-rating-icon ci-star"></i>-->
                                </div>
                                <div class="fs-ms text-muted">99% of users found this review helpful</div>
                            </div>
                        </div>
                        <p class="fs-md mb-2">{{ review.review }}</p>
                        <div class="text-nowrap">
                            <button class="btn-like" type="button">34</button>
                            <button class="btn-dislike" type="button">1</button>
                        </div>
                    </div>
                    <div class="text-center">
                        <button v-if="(currentPage != lastPage)" @click="loadMoreReviews" class="btn btn-outline-accent" type="button"><i class="ci-reload me-2"></i>Load more reviews</button>
                    </div>
                </div>
                <!-- Leave review form-->
                <div class="col-md-5 mt-2 pt-4 mt-md-0 pt-md-0">
                    <div class="bg-secondary py-grid-gutter px-grid-gutter rounded-3">
                        <h3 class="h4 pb-2">Write a review</h3>
                        <form class="needs-validation"  novalidate @submit.prevent="submitReview">
                            <div class="mb-3">
                                <label class="form-label" for="review-name">Your name<span class="text-danger">*</span></label>
                                <input class="form-control" v-model="form.full_name" type="text" required id="review-name">
                                <div class="invalid-feedback">Please enter your name!</div><small class="form-text text-muted">Will be displayed on the comment.</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="review-email">Your email<span class="text-danger">*</span></label>
                                <input class="form-control" v-model="form.email" type="email" required id="review-email">
                                <div class="invalid-feedback">Please provide valid email address!</div><small class="form-text text-muted">Authentication only - we won't spam you.</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="review-rating">Rating<span class="text-danger">*</span></label>
                                <select v-model="form.rating" class="form-select" required id="review-rating">
                                    <option value="">Choose rating</option>
                                    <option value="5">5 stars</option>
                                    <option value="4">4 stars</option>
                                    <option value="3">3 stars</option>
                                    <option value="2">2 stars</option>
                                    <option value="1">1 star</option>
                                </select>
                                <div class="invalid-feedback">Please choose rating!</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="review-text">Review<span class="text-danger">*</span></label>
                                <textarea class="form-control" v-model="form.review" rows="6" required id="review-text"></textarea>
                                <div class="invalid-feedback">Please write a review!</div><small class="form-text text-muted">Your review must be at least 50 characters.</small>
                            </div>
                            <button class="btn btn-primary btn-shadow d-block w-100">Submit a Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Reviews",
    data(){
        return{
            form: {
                full_name:'',
                email:'',
                rating:'',
                review:'',
            },
            userReviews:[],
            sortBy: 'latest',
            pageNumber:1,
            lastPage:null,
            currentPage:null
        }
    },
    created() {
        this.getReviews();
    },
    methods:{
        submitReview() {
            if(this.form.full_name !== '' && this.form.email !== '' && this.form.rating !== '' && this.form.review !== '') {
                let loader = this.$loading.show();
                axios.put('http://127.0.0.1:8999/api/submit-review', {
                        review: this.form,
                        product_id: this.$route.params.product_id
                }).then(response => {
                    if(response.status === 200) {
                        this.userReviews.push(response.data.review);
                        this.$toast.success('Your review is submitted successfully');
                    }
                    loader.hide();
                }).catch(error => {
                    loader.hide();
                    this.$toast.error('oops an error occurred');
                });
            }
        },

        getReviews() {
            let loader = this.$loading.show();
            axios.get('http://127.0.0.1:8999/api/get-reviews', {
                params: {
                    sort_by: this.sortBy,
                    page: this.pageNumber,
                    product_id: this.$route.params.product_id
                }
            }).then(response => {
                this.userReviews.push(...response.data.data);
                this.lastPage = response.data.meta.last_page;
                this.currentPage = response.data.meta.current_page;
                loader.hide();
            }).catch(error => {
                loader.hide();
                this.$toast.error('oops an error occurred');
            });
        },

        applyRatingFilter(event) {
            this.sortBy = event.target.value;
            this.userReviews = [];
            this.getReviews();
        },

        loadMoreReviews() {
            if (! this.currentPage != this.lastPage) {
                this.pageNumber++;
                this.getReviews();
            }
        }
    }

}
</script>

<style scoped>

</style>
