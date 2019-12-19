<template>
    <li @click="$emit('resetFromList', filter[0])" class="products-filter_item">
        <span class='products-filter_text'>{{filter[1]}}</span>
        <span class='item-cleaner'>
     <svg class='filter-cleaner_icon'>
            <use xlink:href='#close'></use>
     </svg>
        </span>
    </li>
</template>

<script>
    export default {
        props: ['filter'],
    }
</script>

<style scoped>

</style>
