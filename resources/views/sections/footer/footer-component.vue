<template>
    <footer class="full-size authorized footer">
        <router-link class="add-tour button mod_color-light-green" to="/tour/create">+ Добавить
            тур
        </router-link>
        <!--@guest-->
        <!--@include('components.user-block.user_unauthorized.user_unauthorized')-->
        <!--@else-->
        <!--@include(('components.user-block.user_authorized.user_authorized'))-->
        <!--@endguest-->

        <user-unauthorized v-if="!authenticated"></user-unauthorized>
        <user-authorized :user="user" v-else></user-authorized>

        <div class="copyright">
            <span>Design from Zirella</span>
            <span>&copy ColorLife, 2018</span>
        </div>
    </footer>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
                user: 'auth/user',
            })
        },
    }
</script>

<style scoped>

</style>
