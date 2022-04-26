import VueRouter from "vue-router";
import routes from "./routes";

const router = new VueRouter
({
    mode: 'history',
    routes
})

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('apiToken') == null) {
            next({ path: '/account-signin',  params: { nextUrl: to.fullPath } })
        } else {
            next(true)
        }
    }
    next(true);
})

export default router;
