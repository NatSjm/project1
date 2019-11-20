<template>
    <section class="products">
        <div class="products-list">
            <product-card v-for="tour in tours" :key="tour.id" :tour="tour"></product-card>
        </div>

    </section>
</template>

<script>
    export default {
        props: [
           'tours'
        ]
    }
</script>

<style scoped>

</style>
