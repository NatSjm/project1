<template>
    <div class="header-mobile mod_opened ">

        <div class="header_top">
            <nav class="min-nav">
                <ul class="min-nav_list">
                    <router-link tag="li"  v-for="(category, key) in allCategories"
                                 v-bind:key="key" class="main-nav_item" to="/search">
                        <a @click="closeMenu" class="main-nav_link">
                            {{category}}
                        </a>
                    </router-link>
                </ul>
            </nav>
        </div>

        <div class="user-block" @click="closeMenu">
            <user-unauthorized ></user-unauthorized>
            <!--@guest-->
            <!--@include('components.user-block.user_unauthorized.user_unauthorized')-->
            <!--@else-->
            <!--@include(('components.user-block.user_authorized.user_authorized'))-->
            <!--@endguest-->

        </div>

        <div class="header_bottom" @click="closeMenu">
            <router-link  class="add-tour button mod_color-light-green"  to="/tour/create">+ Добавить
                тур</router-link>
        </div>

    </div>

</template>

<script>
    export default {
        props: ['allCategories'],
        methods: {
            closeMenu: function () {
                this.$emit('closed');
            }
        }
    }
</script>

<style scoped>

</style>
