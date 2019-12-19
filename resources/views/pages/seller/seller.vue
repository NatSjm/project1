<template>

    <div class="seller-page_content-wrapper cont">

        <div class="seller-page_breadcrumbs">
       <breadcrumbs/>
        </div>

        <!--@if(count($seller->belongingTours))-->
        <div v-if="personTours">
            <h2 class="seller-page_title headline-2">Предложения продавца</h2>
            <div class="seller-page_main-content">
                <section class="filter">
                    <form  @change="fetchData" class="filter_form" method="get" action="#" id="filter_form">

                        <label class="filter_title" for="filter_form">Категория</label>
                        <fieldset class="filter_fields">
                            <div class="filter_input">
                                <div class="checkbox">
                                    <input type="radio" v-model="tour_type" class="checkbox_input" name="tour_type" value=""
                                           id="any-tourType">
                                    <label class="checkbox_label"  for="any-tourType">Все категории</label>
                                </div>
                            </div>

                            <div v-for="tourType in allTourTypes" :key="tourType.id" class="filter_input">
                                <div class="checkbox">
                                    <input type="radio"
                                           v-model="tour_type"
                                           class="checkbox_input"
                                           name="tour_type"
                                           :value="tourType.name"
                                           :id="'tourType' + tourType.id">
                                    <label class="checkbox_label"
                                           :for="'tourType' + tourType.id">{{ tourType.name}}</label>
                                </div>

                            </div>

                        </fieldset>

                    </form>
                </section>

              <products  :tours="personTours"></products>

            </div>
        </div>

        <p v-else>
            У данного пользователя еще нет объявлений
        </p>
    </div>

</template>

<script>

    import {mapGetters, mapActions} from 'vuex';


    export default {
        data: function () {
            return {
                tour_type: null,
            }
        },
        methods: {
            fetchData(){
                let payload = {
                    id: this.$route.params.id,
                    params: {tour_type: this.tour_type},
                };
                this.$store.dispatch('getItemsForSeller',  payload);
            },
            ...mapActions({
                addProductToCart: 'cart/addProductToCart'
            }),
        },

        created() {
           this.fetchData();
        },
        watch: {
            '$route': 'fetchData'
        },

        computed: {
            ...mapGetters([
                'personTours',
                'allTourTypes',
            ]),

        },
    }
</script>

<style scoped>

</style>
