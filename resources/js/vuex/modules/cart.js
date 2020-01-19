import axios from "axios";

export default {
    namespaced: true,

    state: {
        cartItems: [],
    },

    getters: {
        cartTotal(state, getters) {
            return state.cartItems.reduce((total, product) => total + product.cartItem.price * product.quantity, 0).toLocaleString();
        },
    },

    mutations: {
        pushProductToCart(state, product) {
            state.cartItems.push({
                id: product.id,
                quantity: 1,
                cartItem: product,
            })
        },

        incrementItemQuantity(state, product) {
            product.quantity++
        },

        removeProductFromCart(state, cartItemIndex) {
            state.cartItems.splice(cartItemIndex, 1);
        },

        emptyCart(state) {
            state.cartItems = []
        }
    },

    actions: {
        addProductToCart({state, getters, commit, rootState, rootGetters}, product) {
            const cartItem = state.cartItems.find(item => item.id === product.id);
            if (!cartItem) {
                commit('pushProductToCart', product);
            } else {
                commit('incrementItemQuantity', cartItem);
            }
        },
        removeProductFromCart({state, commit}, productId) {
            const cartItemIndex = state.cartItems.findIndex(item => item.id === productId);
            commit('removeProductFromCart', cartItemIndex);
        },
        makeOrder({state, commit}) {
            if (state.cartItems) {
                return axios.post('/api/makeOrder', state.cartItems).then(() => {
                    commit('emptyCart');
                });
            }
        }


    }
}
