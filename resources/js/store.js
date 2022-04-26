import Vue from 'vue';

let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');
let cartTotal = window.localStorage.getItem('cartTotal');
let shippingAddress = window.localStorage.getItem('shippingAddress');
let shippingMethod = window.localStorage.getItem('shippingMethod');
let orderId = window.localStorage.getItem('orderId');
let apiToken = window.localStorage.getItem('apiToken');
let userId = window.localStorage.getItem('userId');
let userName = window.localStorage.getItem('userName');
let emailAddress = window.localStorage.getItem('emailAddress');

let store = {
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
        cartTotal: cartTotal ? parseInt(cartTotal) : 0,
        shippingAddress: shippingAddress ? shippingAddress : '',
        shippingMethod: shippingMethod ? shippingMethod : '',
        orderId: orderId != '' ? orderId : '',
        apiToken: apiToken != '' ? apiToken : '',
        userName: userName != '' ? userName : '',
        userId: userId != '' ? userId : '',
        emailAddress: emailAddress != '' ? emailAddress : '',
    },

    mutations: {
        addToCart(state, {item, size}) {
            const purchasedSize = [];
            let found = state.cart.find(product => product.id == item.id)
            if (found) {
                let foundWithSize = state.cart.find(product => product.id == item.id && product.size == size)
                if(foundWithSize) {
                    purchasedSize.push(size);
                    foundWithSize.quantity ++;
                    foundWithSize.orderedSizes.push(size);
                    foundWithSize.totalPrice = foundWithSize.quantity * foundWithSize.price;

                } else if( (!foundWithSize) && found) {
                    purchasedSize.push(size);
                    found.quantity ++;
                    found.orderedSizes.push(size);
                    found.totalPrice = found.quantity * found.price;
                }

            } else {
                state.cart.push(item);
                purchasedSize.push(size);

                Vue.set(item, 'quantity', 1);
                Vue.set(item, 'size', size);
                Vue.set(item, 'orderedSizes', purchasedSize);
                Vue.set(item, 'totalPrice', item.price);

            }

            let itemsTotalPrice = 0;
            state.cart.forEach((item, i) => {
                itemsTotalPrice   += parseInt(item.quantity * item.price);
            });
            state.cartTotal = itemsTotalPrice;

            state.cartCount++;

            this.commit('saveCart');

        },

        removeFromCart(state, item) {
            let index = state.cart.indexOf(item);

            if (index > -1) {
                let product = state.cart[index];
                state.cartCount -= product.quantity;
                state.cart.splice(index, 1);

                let itemsTotalPrice = 0;
                state.cart.forEach((item, i) => {
                    itemsTotalPrice   += parseInt(item.quantity * item.price);
                });
                state.cartTotal = itemsTotalPrice;

            }

            this.commit('saveCart');
        },

        updateQuantity(state, {item, event }) {
            let found = state.cart.find(product => product.id == item.id && product.size == item.size);
            let currentItemQuantity =  event.target.value != '' ? event.target.value : 1;

            if (found) {
                found.quantity = currentItemQuantity;
                found.totalPrice = found.quantity * found.price;
            }

            let totalItems = 0;
            let itemsTotalPrice = 0;
            state.cart.forEach((item, i) => {
                totalItems   += parseInt(item.quantity);
                itemsTotalPrice   += parseInt(item.quantity * item.price);
            });

            state.cartCount = totalItems;
            state.cartTotal = itemsTotalPrice;

            this.commit('saveCart');
        },

        removeOrderedSize(state, {size, item}) {
            let found = state.cart.find(product => product.id == item.id)
            if (found) {
                const index = found.orderedSizes.indexOf(size);
                if(found.orderedSizes.length > 1){
                    if (index > -1) {
                        found.orderedSizes.splice(index, 1); // 2nd parameter means remove one item only
                    }
                    found.quantity--;
                    found.totalPrice = found.quantity * found.price;
                    found.cartCount--;

                    let totalItems = 0;
                    let itemsTotalPrice = 0;
                    state.cart.forEach((item, i) => {
                        totalItems   += parseInt(item.quantity);
                        itemsTotalPrice   += parseInt(item.quantity * item.price);
                    });

                    state.cartCount = totalItems;
                    state.cartTotal = itemsTotalPrice;
                    this.commit('saveCart');
                }
            }
        },

        addSize(state, {size, item }) {
            let found = state.cart.find(product => product.id == item.id);
            if (found) {
                Vue.set(item, 'size', size);
            }
            this.commit('saveCart');
        },

        updateSize(state, {item, event }) {
            let found = state.cart.find(product => product.id == item.id);
            if (found) {
                Vue.set(item, 'size', event.target.value);
            }
            this.commit('saveCart');
        },

        saveShippingAddress(state, shippingAddress) {

            state.shippingAddress = shippingAddress;
            this.commit('saveCart');

        },

        saveShippingMethod(state, shippingMethod) {

            state.shippingMethod = shippingMethod;
            this.commit('saveCart');

        },

        saveOrderId(state, orderId) {

            state.orderId = orderId;
            this.commit('saveCart');

        },

        storeUserTokenAndId(state, userObject) {

            state.userId = userObject.id;
            state.apiToken = userObject.api_token;
            state.emailAddress = userObject.email;
            this.commit('saveTokenAndId');

        },

        saveUserName(state, userName) {

            state.userName = userName;
            this.commit('saveLoggedInUserName');

        },

        clearCartFromStore () {
            window.localStorage.removeItem('cart');
            window.localStorage.removeItem('cartCount');
            window.localStorage.removeItem('cartTotal');
            window.localStorage.removeItem('shippingAddress');
            window.localStorage.removeItem('shippingMethod');
            window.localStorage.removeItem('orderId');
        },

        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.cart));
            window.localStorage.setItem('cartCount', state.cartCount);
            window.localStorage.setItem('cartTotal', state.cartTotal);
            window.localStorage.setItem('shippingAddress', state.shippingAddress);
            window.localStorage.setItem('shippingMethod', state.shippingMethod);
            window.localStorage.setItem('orderId', state.orderId);
        },

        saveTokenAndId(state) {
            window.localStorage.setItem('apiToken', state.apiToken);
            window.localStorage.setItem('userId', state.userId);
            window.localStorage.setItem('emailAddress', state.emailAddress);
        },

        saveLoggedInUserName(state) {
            window.localStorage.setItem('userName', state.userName);
        },

    },

};

export default store;
