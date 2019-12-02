<template>
    <section class="products">
        {{paginator.total}}
        <div class="products-list">
            <product-card v-for="tour in tours" :key="tour.id" :tour="tour"></product-card>
        </div>
        <paginate
                v-model="page"
                :page-count="Number(paginator.last_page)"
                :hide-prev-next=true
                :click-handler="paginateHandler"
                :page-range=1
                :margin-pages=1
                :prev-text="'<'"
                :next-text="'>'"
                :prev-link-class="'pagination_item'"
                :next-link-class="'pagination_item'"
                :page-link-class="'pagination_item'"
                :active-class="'active'"
                :container-class="'pagination'">
        </paginate>
    </section>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        data() {
            return {
                page: 1
            }
        },

        props: [
            'tours',
            'searchpage',
        ],

        methods: {
            paginateHandler() {
                this.$emit('sendpage', this.page);
            }
        },

        computed: {
            ...mapGetters([
                'paginator',
            ]),

        },
        watch: {
            searchpage() {
                this.page = 1;
            }
        },

    }
</script>

<style scoped>

</style>
