<template>
    <div class="pictogram">
        <router-link class="pictogram_link" :to="{path: '/search', query:  {routeParamsTourType: type.name}}">
            <div class="pictogram_container">
                <svg class="pictogram_icon" viewBox="0 0 23 21">
                    <use v-bind:xlink:href="'#' + type.icon "></use>
                </svg>
            </div>
        </router-link>
        <p class="pictogram_title">{{ type.name }}</p>
        <div class="triangle mod_blue"></div>
        <div class="triangle mod_white"></div>
    </div>
</template>

<script type="text/javascript">
    export default {
        // name: "pictogram-line",
        props: ['type'],
        data() {
            return {};
        }
    }
</script>

