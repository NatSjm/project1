<template>
    <div class="user unauthorized">
        <!--{{user? user.first_name : ''}}-->
        <!--<template v-if="!authenticated">-->
        <router-link  class="user_entry" to="/enter">
            Вход / Регистрация
        </router-link>
        <!--</template>-->
        <!--<template v-else >-->
        <!--<span>{{user.first_name}}</span>-->

        <!--</template>-->

    </div>

</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    export default {
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
                user: 'auth/user',
            })
        },

        methods: {
            ...mapActions({
                logOutAction: 'auth/logOut'
            }),

            logOut(){
                this.logOutAction().then(()=>{

                    // this.$router.push({
                    //     name: 'home'
                    // })
                })
            }
        }
    }
</script>

<style scoped>

</style>
l
