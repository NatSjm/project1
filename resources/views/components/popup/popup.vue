<template>

    <div class="popup cont-med mod_color-white">
        <div class="popup_main">
            <ul class="personal-menu">
                <li class="personal-menu_item my-propo active"><span class="personal-menu_icon"><svg
                        viewBox="0 0 9.999 10">
                           <use class="personal-menu_use" xlink:href="#propositions"></use>
                       </svg></span>
                    <router-link class="personal-menu_link" :to="{name:'seller-page', params: {id: user.id, name:
                    user.first_name +' ' + user.last_name
                }}">Мои предложения
                    </router-link>

                </li>
                <li class="personal-menu_item my-purch"><span class="personal-menu_icon"><svg viewBox="0 0 9.999 10">
                           <use class="personal-menu_use" xlink:href="#purchases"></use>
                       </svg></span>
                    <router-link class="personal-menu_link" :to="{name:'purchases-page', params: {id: user.id}}">Мои
                        покупки
                    </router-link>
                </li>
                <li class="personal-menu_item my-orders"><span class="personal-menu_icon"><svg viewBox="0 0 9.999 10">
                           <use class="personal-menu_use" xlink:href="#bell"></use>
                           </svg></span>
                    <router-link class="personal-menu_link" :to="{name:'orders-page', params: {id: user.id}}">Мои
                        заказы
                    </router-link>
                </li>
                <li class="personal-menu_item person-info"><span class="personal-menu_icon"><svg viewBox="0 0 9.999 10">
                <use class="personal-menu_use" xlink:href="#user"></use>
                </svg></span>
                    <router-link class="personal-menu_link" :to="{name:'person-page', params: {id: user.id}}">Личные
                        данные
                    </router-link>
                </li>
            </ul>
        </div>
        <div class="popup_bottom mod_color-dark-milk">
            <a class="popup-bottom_link"
               href="#"
               @click.prevent="logOut">Выход
                <span class="popup-bottom_icon">
                    <svg viewBox="0 0 9.999 10">
                        <use class="personal-menu_use" xlink:href="#logout">
                        </use>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        computed: {
            ...mapGetters({
                user: 'auth/user',
            })
        },

        methods: {
            ...mapActions({
                logOutAction: 'auth/logOut'
            }),


            logOut() {
                this.logOutAction().then(() => {

                    // this.$router.push({
                    //     name: 'home'
                    // })
                })
            }
        }
    }
</script>

<style>

</style>
