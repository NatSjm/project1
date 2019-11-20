// var cartProductPrices = $('.cart-product_price');
// var sumValue = $('.sum_value');
// var sum = 0;
//
// cartProductPrices.each(function(){
//     let val = ($(this).text()).split(' ').join('');
//     sum+= parseInt(val, 10);
// });
//
// sum=sum.toLocaleString();
// sumValue.text(sum+' ₿');
//
import {mapState, mapGetters, mapActions} from 'vuex'
export default {
    computed: {
        ...mapState('cart', {
            cartItems: state => state.cartItems,
        }),
        ...mapGetters('cart', {
            cartTotal: 'cartTotal'
        }),
    },
    methods: {
        ...mapActions('cart', ['removeProductFromCart'])
    }
}
