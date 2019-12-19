<template>
    <div class="order-item">
    <img class="order-item_img" v-bind:src="'/storage/images/' +  tour.main_img.path">
    <div class="order-item_info">
        <div class="order-item_tags">{{tour.country.name}} {{ tour.hotel.hotel_class }}<sup>*</sup>
            {{ tour.tour_type.name }}</div>
        <div class="order-item_price">{{ tour.price.toLocaleString() }} ₿</div>
    </div>
    </div>
</template>

<script>
    export default {
        props:[
            'tour',
        ],
        data() {
            return {

            }
        },

        created(){
            
        }
    }
</script>

<style scoped>

</style>
