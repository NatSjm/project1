<template>

    <div class="person-page_container cont">

        <div class="person-page_breadcrumbs">
            <breadcrumbs></breadcrumbs>
        </div>

        <h2 class="person-page_title headline-2">Личные данные</h2>

        <section class="person-page_main">
            <div class="person mod_border-grey">

                <input type="file" form="person_data" id="foto" @change="onFileSelected" name="avatar"
                       class="person_img">
                <label class="person_img-title" for="foto"
                       v-bind:style='{ backgroundImage: `url("${avatarUrl}")` }'>
                </label>
                <!--@error('avatar')-->
                <!--<div class="error_box">{{ $message }}</div>-->
                <!--@enderror-->


                <form @submit.prevent="" id="person_data" class="person_data" action=""
                      enctype="multipart/form-data" method="post">

                    <div class="person_fullname">
                        <label class="person_label" for="person_name">Имя</label>
                        <input type="text" id="person_name" name="first_name" class="person_input" v-model="first_name">
                        <!--@error('first_name')-->
                        <!--<div class="error_box">{{ $message }}</div>-->
                        <!--@enderror-->
                        <label class="person_label" for="person_surname">Фамилия</label>
                        <input type="text" id="person_surname" name="last_name" class="person_input"
                               v-model="last_name">
                        <!--@error('last_name')-->
                        <!--<div class="error_box">{{ $message }}</div>-->
                        <!--@enderror-->
                    </div>
                    <div class="person_contacts">
                        <label class="person_label" for="person_phone">Телефон</label>
                        <input type="tel" id="person_phone" name="phone" class="person_input" v-model="phone">
                        <!--@error('phone')-->
                        <!--<div class="error_box">{{ $message }}</div>-->
                        <!--@enderror-->
                        <label class="person_label" for="person_email">Email</label>
                        <input type="email" id="person_email" name="email" class="person_input"
                               v-model="email">
                        <!--@error('email')-->
                        <!--<div class="error_box">{{ $message }}</div>-->
                        <!--@enderror-->
                    </div>


                </form>


            </div>
            <button type="submit" class="person_submit button mod_color-med-blue" v-on:click="sendRequest"
                    form="person_data">Сохранить изменения
            </button>
            <!--@if(session('success'))-->
            <!--<div class="message_box">{{session('success')}}</div>-->
            <!--@endif-->

        </section>
    </div>

</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        props: [
            'id'
        ],
        data() {
            return {
                avatar: null,
                first_name: null,
                last_name: null,
                phone: null,
                email: null,
                avatarUrl: null,
            };
        },
        computed: {
            ...mapGetters({
                user: 'auth/user',
            })
        },
        methods: {
            onFileSelected(event) {
                this.avatar = event.target.files[0];
                console.log(this.avatar);
            },
            sendRequest() {
                let formData = new FormData();
                formData.append("_method", 'PATCH');
                if(this.avatar) {
                    formData.append('avatar', this.avatar);
                }
                formData.append('first_name', this.first_name);
                formData.append('last_name', this.last_name);
                formData.append('phone', this.phone);
                formData.append('email', this.email);


                this.updatePersonData(formData);
            },
            ...mapActions('auth', ['updatePersonData'])


        },

        created() {
            this.first_name = this.user.first_name;
            this.last_name = this.user.last_name;
            this.phone = this.user.phone;
            this.email = this.user.email;
            this.avatarUrl = '/storage/' + this.user.avatar;

        },
        mounted() {
            document.querySelector(".person_img").addEventListener("change", function () {
                if (this.files[0]) {
                    var fr = new FileReader();
                    fr.addEventListener("load", function () {
                        document.querySelector(".person_img-title").style.backgroundImage = "url(" + fr.result + ")";
                    }, false);
                    fr.readAsDataURL(this.files[0]);
                }
            });

            let avatar = $('.person_img-title');

            function  avatarResiser() {
                if (window.matchMedia("screen and (max-width: 1279px)").matches) {
                    avatar.css("width", "100%");
                    avatar.height(avatar.width());
                } else {
                    avatar.height(180);
                    avatar.width(180);
                }
            }

            avatarResiser();

            $(window).resize(avatarResiser);
        }



    }
</script>

<style scoped>

</style>
