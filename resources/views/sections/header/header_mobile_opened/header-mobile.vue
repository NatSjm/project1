<template>
    <div class="header-mobile mod_opened ">

        <div class="header_top">
            <nav class="min-nav">
                <ul class="min-nav_list">
                    <li v-for="(category, key) in allCategories"
                        v-bind:key="key"
                        class="main-nav_item">
                        <router-link class="main-nav_link"
                                     :to="{path: '/search', query:  {routeParamsCategory: category.name}}">
                            {{category.name}}
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="user-block">
            <user-unauthorized v-if="!authenticated"></user-unauthorized>
            <user-authorized :user="user" v-else></user-authorized>
            <header-cart></header-cart>
            <!--@guest-->
            <!--@include('components.user-block.user_unauthorized.user_unauthorized')-->
            <!--@else-->
            <!--@include(('components.user-block.user_authorized.user_authorized'))-->
            <!--@endguest-->
        </div>

        <div class="header_bottom"  >
            <router-link  class="add-tour button mod_color-light-green"   to="/tour/create">+ Добавить
                тур</router-link>
        </div>

    </div>

</template>

<script>
    export default {
        props: ['allCategories', 'authenticated', 'user'],

    }
</script>

<style scoped>

</style>
