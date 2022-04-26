import Main from "../views/Main";
import Shop from "../views/Shop/Shop";
import productDetailsMain from "../views/ProductDetails/productDetailsMain";
import Cart from "../views/Cart/Cart";
import CheckOutMain from "../views/Checkout/CheckOutMain";
import shippingMain from "../views/ShippingMain/shippingMain";
import Payment from "../views/Payment/Payment";
import checkOutReviewMain from "../views/checkOutReview/checkOutReviewMain";
import checkOutCompleteMain from "../views/CheckOutCompleteMain/checkOutCompleteMain";
import shopCart from "../views/Cart/shopCart";
import test from "../views/test";
import customerOrders from "../views/customerOrdersListMain/customerOrders";
import SignInSignUpPageMain from "../views/SignInSignUpPageMain/SignInSignUpPageMain";
import profileSettingsMain from "../views/profileSettingsMain/profileSettingsMain";
import NotFound from "../NotFound";

const routes = [
    {   path: '/',
        name:'Home',
        component: Main,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/shop/:department?',
        name:'Shop',
        component: Shop,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/product-details/:product_id?',
        name:'product-details',
        component: productDetailsMain,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/cart',
        name:'cart',
        component: Cart,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/checkout',
        name:'check-out',
        component: CheckOutMain,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/shipping',
        name:'shipping',
        component: shippingMain,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/payment',
        name:'payment',
        component: Payment,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/checkout-review',
        name:'checkout-review',
        component: checkOutReviewMain,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/checkout-complete',
        name:'checkout-complete',
        component: checkOutCompleteMain,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/shop-cart',
        name:'shop-cart',
        component: shopCart,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/account-orders',
        name:'account-orders',
        component: customerOrders,
        meta: {
            requiresAuth: true
        },
    },
    {   path: '/test',
        name:'test',
        component: test
    },
    {   path: '/account-signin',
        name:'account-signin',
        component: SignInSignUpPageMain,
        meta: {
            requiresAuth: false
        },
    },
    {   path: '/account-profile',
        name:'account-profile',
        component: profileSettingsMain,
        meta: {
            requiresAuth: true
        },
    },
    { path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFound
    },
]

export default routes;


