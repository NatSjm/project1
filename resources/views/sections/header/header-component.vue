<template>
    <header class="header full-size ">


        <div class="header_top">
            <nav class="main-nav">
                <ul class="main-nav_list">

                    <router-link tag="li" v-for="(category, key) in allCategories"
                                 v-bind:key="key" class="main-nav_item" to="/search">
                        <a class="main-nav_link">
                            {{category}}
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
                <user-unauthorized></user-unauthorized>
                <header-cart></header-cart>
            </div>
        </div>

        <div v-if="menuMobile" class="menu-mobile_wrapper">
            <header-mobile :allCategories="allCategories" @closed="toggleMenu"></header-mobile>
        </div>

        <div class="header_bottom">
            <div class="main-search">
                <form class="main-search_form" action="">
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
    export default {
        props: ['all-categories'],
        data() {
            return {
                menuMobile: false,
            }

        },
        methods: {
            toggleMenu: function () {
                this.menuMobile = !this.menuMobile;
            }
        }
    }
</script>

<style scoped>
</style>
