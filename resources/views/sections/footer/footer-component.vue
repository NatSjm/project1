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
        <user-unauthorized></user-unauthorized>

        <div class="copyright">
            <span>Design from Zirella</span>
            <span>&copy ColorLife, 2018</span>
        </div>
    </footer>
</template>

<script>
    export default {}
</script>

<style scoped>

</style>
