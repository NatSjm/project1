<template>

    <div class="cart_container cont">

        <!--<div class="cart_breadcrumbs">-->
        <!--{{ Breadcrumbs::render('cart') }}-->
        <!--</div>-->

        <h2 class="cart_title headline-2">Корзина</h2>

        <section class="cart_main">

            <div v-if="cartItems.length>0" class="full-cart">

                <div class="full-cart_main">
                    <table class="cart-products table mod_border-grey">
                        <thead>
                        <tr class="cart-products_head mod_color-light-milk">
                            <td class="cart-products_name">Название</td>
                            <td class="cart-products_price">Цена</td>
                            <td class="cart-products_delete">Удаление</td>
                        </tr>
                        </thead>
                        <tbody class="cart-products_body">

                        <tr v-for="product in cartItems" class="cart-product" v-bind:key="product.id">
                            <td class="cart-product_name">
                                <div class="cart-product_details">
                                    <img class="cart-product_img"
                                         v-bind:src="'/storage/images/' + product.cartItem.mainImg ">
                                    <div class="cart-product_info">
                                        <router-link
                                                class="cart-product_link"
                                                to="/product">{{product.cartItem.counrtyName}}
                                            {{product.cartItem.hotelClass}}<sup> &#42;</sup>
                                            {{product.cartItem.tourTypeName}}
                                            <span v-if="product.quantity > 1">({{product.quantity}})</span>
                                        </router-link>
                                    </div>
                                </div>
                            </td>

                            <td class="cart-product_price">{{product.cartItem.price.toLocaleString()}} ₿</td>
                            <td class="cart-product_delete">
                                <div class="cart-product_delete-container">
                                    <a @click.prevent="removeProductFromCart(product.id)" href="#">
                                        <svg class="cart-product_delete-icon">
                                            <use xlink:href="#rubbish-bin-grey"></use>
                                        </svg>
                                    </a>
                                </div>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="full-cart_total mod_border-grey">
                    <div class="sum">
                        <span>Итого:</span><span class="sum_value"> {{cartTotal}}
                                ₿</span>
                    </div>
                    <a href="#" @click="makeOrderAndRedirect" class="full-cart_order-button button
                        mod_color-med-blue">Заказать</a>
                </div>
            </div>

            <div v-else>Корзина пуста</div>

        </section>
    </div>
</template>
<script src="./cart.js"></script>
