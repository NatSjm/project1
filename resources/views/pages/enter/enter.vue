<template>
    <div class="login_wrapper cont">
        <breadcrumbs class="login_breadcrumbs"></breadcrumbs>
        <h2 class="headline-2 enter-page_title page-title">Авторизация</h2>
        <div class="login_main">
            <div class="login_form mod_border-grey">
                <form id="enter" class="entrance" @submit.prevent="submitLogin">
                    <label class="entrance_title" for="enter">01. Вход</label>
                    <div class="entrance_top">
                        <input type="email"
                               class="entrance_input input"
                               placeholder="Введите email"
                               name="email"
                               required
                               v-model="loginForm.email">

                        <input type="password"
                               autocomplete="on"
                               class="entrance_input input"
                               placeholder="Введите пароль"
                               name="password"
                               required
                               v-model="loginForm.password">

                    </div>


                    <div class="entrance_bottom">
                        <input type="submit" class="entrance_submit button mod_color-med-blue" value="Войти">
                        <!--<a href="{{ route('password.request') }}" class="link entrance_link">забыли пароль</a>-->
                    </div>
                </form>
            </div>

            <div class="login_form mod_border-grey">
                <form id="registration" class="entrance" @submit.prevent="submitRegister">
                    <label class="entrance_title" for="registration">01. Вход</label>
                    <div class="entrance_top">
                        <input type="email"
                               class="entrance_input input"
                               placeholder="Введите email"
                               name="email"
                               required
                               v-model="registerForm.email">

                        <input type="password"
                               autocomplete="on"
                               class="entrance_input input"
                               placeholder="Введите пароль"
                               name="password"
                               required
                               v-model="registerForm.password">

                    </div>

                    <div class="entrance_bottom">
                        <input type="submit" class="entrance_submit button mod_color-light-green"
                               value="Зарегистрироваться">
                    </div>


                </form>
            </div>

        </div>
    </div>
</template>

<script type="text/javascript">

    import {mapActions} from 'vuex';

    export default {
        data() {
            return {
                loginForm: {
                    email: '',
                    password: '',
                },
                registerForm: {
                    email: '',
                    password: '',
                }
            }
        },
        methods: {
            ...mapActions({
                login: 'auth/login',
                register: 'auth/register'
            }),
            submitLogin() {
                this.login(this.loginForm).then(() => {
                    this.$router.replace({
                        name: 'home'
                    })
                });
            },

            submitRegister() {
                this.register(this.registerForm).then(() => {
                    this.$router.replace({
                        name: 'home'
                    })
                });
            }
        }

    }
</script>
