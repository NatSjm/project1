<template>
    <header class="header full-size ">


        <div class="header_top">
            <nav class="main-nav">
                <ul class="main-nav_list">

                    <router-link tag="li" v-for="(category, key) in allCategories"
                                 v-bind:key="key" class="main-nav_item" to="/search">
                        <a class="main-nav_link">
                            {{category.name}}
                        </a>
                    </router-link>
                </ul>
            </nav>
            <logo></logo>

            <button class="hamburger hamburger--spin" v-bind:class="{ 'is-active' : menuMobile }"
                    @click='toggleMenu'
                    type="button">
        <span class="hamburger-box">
        <span class="hamburger-inner"></span>
        </span>
            </button>


            <div class="user-block">
                <user-unauthorized v-if="!authenticated"></user-unauthorized>
                <user-authorized :user="user" v-else></user-authorized>
                <header-cart></header-cart>
            </div>
        </div>

        <div v-if="menuMobile" class="menu-mobile_wrapper">
            <header-mobile :user="user" :authenticated="authenticated" :allCategories="allCategories"></header-mobile>
        </div>

        <div class="header_bottom">
            <div class="main-search">
                <form class="main-search_form" @submit.prevent action="">
                    <input placeholder="Поиск предложений" type="search" name="search" value=""
                           class="ginput
                main-search_input">
                    <button type="submit" class="main-search_submit">
                        <svg class="main-search_icon" viewBox="0 0 12 12">
                            <use xlink:href="#search"></use>
                        </svg>
                    </button>
                </form>
            </div>
            <router-link class="add-tour mod_color-white" to="/tour/create">+ Добавить
                тур
            </router-link>
        </div>
    </header>

</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        // props: ['all-categories'],

        data() {
            return {
                menuMobile: false,
            }

        },
        computed: {
            ...mapGetters({
                allCategories: 'allCategories',
                authenticated: 'auth/authenticated',
                user: 'auth/user',
            })
        },

        watch: {
            $route(to, from) {
                this.menuMobile = false;
            }
        },


        methods: {
            toggleMenu: function () {
                this.menuMobile = !this.menuMobile;
            },

        },


        created() {


        }
    }
</script>

<style scoped>
    .menu-mobile_wrapper {
        display: block;
    }
</style>
