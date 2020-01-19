<template>
    <div class="user authorized">

        <img class="user_avatar" :src="'/storage/'+user.avatar" alt="">
        <div class="user_profile-link">
            <span class="user_name"> {{ user.first_name }} {{user.last_name}}</span>
            <popup></popup>
        </div>
    </div>

</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        props: [
            'user'
        ],
        // methods: {
        //     ...mapActions({
        //         logOutAction: 'auth/logOut'
        //     }),
        //
        //     logOut(){
        //         this.logOutAction().then(()=>{
        //
        //             // this.$router.push({
        //             //     name: 'home'
        //             // })
        //         })
        //     }
        // }
    }
</script>

<style >

</style>
