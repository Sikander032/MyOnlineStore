<template>
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <!--side bar-->
            <user-account-side-bar></user-account-side-bar>
            <!-- Content  -->
            <section class="col-lg-8">
                <!-- Toolbar-->
                <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
                    <div class="d-flex align-items-center">
                        <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2" for="order-sort">Sort
                            orders:</label>
                        <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="order-sort">Sort orders:</label>
                        <select class="form-select" id="order-sort">
                            <option>All</option>
                            <option>Delivered</option>
                            <option>In Progress</option>
                            <option>Delayed</option>
                            <option>Canceled</option>
                        </select>
                    </div>
                    <a class="btn btn-primary btn-sm d-none d-lg-inline-block" @click="signOut"><i
                        class="ci-sign-out me-2"></i>Sign out</a>
                </div>
                <!-- Orders list-->
                <div class="table-responsive fs-md mb-4">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Date Purchased</th>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="customerOrder in customerOrders" :key="customerOrder.id">
                            <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="#order-details"
                                                data-bs-toggle="modal">{{customerOrder.order_number}}</a></td>
                            <td class="py-3">{{customerOrder.date_purchased}}</td>
                            <td class="py-3"><span class="badge bg-info m-0">{{customerOrder.status}}</span></td>
                            <td class="py-3">${{customerOrder.total}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination-->
                <nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="ci-arrow-left me-2"></i>Prev</a>
                        </li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
                        <li class="page-item active d-none d-sm-block" aria-current="page"><span
                            class="page-link">1<span class="visually-hidden">(current)</span></span></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
                        <li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
                    </ul>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i
                            class="ci-arrow-right ms-2"></i></a></li>
                    </ul>
                </nav>
            </section>
        </div>
    </div>
</template>

<script>
import userAccountSideBar from "../userAccountSideBar/userAccountSideBar";
export default {
    name: "ordersList",
    components: {userAccountSideBar},
    props: {
        customerOrders: {
            required: true,
            type: Array
        },
    },
    created() {
        // console.log(this.customerOrders);
    },
    methods: {
        signOut() {
            window.localStorage.removeItem('userName');
            window.localStorage.removeItem('userId');
            window.localStorage.removeItem('apiToken');
            this.$router.push('/');
        }
    }
}
</script>

<style scoped>

</style>
