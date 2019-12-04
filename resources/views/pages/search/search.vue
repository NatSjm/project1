<template>
    <div class="search-page_content-wrapper cont">


        <!--{{ Breadcrumbs::render('search') }}-->

        <h2 class="search-page_title headline-2">Поиск</h2>


        <div class="search-page_main-content">
            <div v-if="filterToggler" class="filter-wrapper mod_desctop">
                <aside class="filter">
                    <svg @click="filterToggle" v-if="filterToggler" class="filter-close">
                        <use xlink:href="#close"></use>
                    </svg>
                    <form @change="filterResults" class="filter_form" id="filter-form" action="#">
                        <fieldset class="filter_fields fieldset" id="country">
                            <label class="fieldset_title" for="country">Страна</label>
                            <div class="select-wrapper">
                                <select v-model="country" class="filter_select"
                                        name="country">
                                    <option class="filter_option" value="">Все</option>
                                    <option v-for="country in allCountryNames" class="filter_option"
                                            :value="country.name">{{country.name}}
                                    </option>
                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="hotel-class">
                            <label class="fieldset_title" for="hotel-class">Класс отеля</label>
                            <div class="select-wrapper">
                                <select v-model="hotel" class="filter_select" name="hotel">
                                    <option class="filter_option" value="">Любой</option>
                                    <option v-for="hotel in allHotels" class="filter_option" :value="hotel.hotelClass">
                                        {{hotel.hotelClass}}<sup>*</sup></option>
                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="tour-type">
                            <label class="fieldset_title" for="tour-type">Тип тура</label>
                            <div class="select-wrapper">
                                <select v-model="tour_type" class="filter_select" name="tour_type" id="">
                                    <option class="filter_option" value="">Любой</option>
                                    <option v-for="tourType in allTourTypes" class="filter_option"
                                            :value="tourType.name">{{tourType.name}}
                                    </option>
                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="food">
                            <label class="fieldset_title" for="food">Питание</label>
                            <div class="radio_wrapper">
                                <div class="mod_column-left">
                                    <input v-model="nutrition" checked type="radio" name="nutrition" value=""
                                           class="checkbox_input"
                                           id="any-nutrition">
                                    <label class="checkbox_label" for="any-nutrition">Любое</label>
                                    <div class="checkbox_block" v-for="(nutritionType, key, i) in allNutritionTypes"
                                         v-if="(i%2===0)">
                                        <input type="radio"
                                               name="nutrition" :value="nutritionType.nutritionType"
                                               class="checkbox_input"
                                               v-model="nutrition"
                                               :id="nutritionType.nutritionType">
                                        <label class="checkbox_label"
                                               :for="nutritionType.nutritionType">{{nutritionType.nutritionType}}</label>
                                    </div>
                                </div>
                                <div class="mod_column-right">
                                    <div class="checkbox_block" v-for="(nutritionType, key, i) in allNutritionTypes"
                                         v-if="(i%2!==0)">
                                        <input type="radio"
                                               v-model="nutrition"
                                               name="nutrition" :value="nutritionType.nutritionType"
                                               class="checkbox_input"
                                               :id="nutritionType.nutritionType">
                                        <label class="checkbox_label"
                                               :for="nutritionType.nutritionType">{{nutritionType.nutritionType}}</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="category">
                            <label class="fieldset_title" for="category">Категория</label>
                            <div class="radio_wrapper">
                                <div class="checkbox_block">
                                    <input checked type="radio"
                                           name="category" value=""
                                           v-model="category"
                                           class="checkbox_input"
                                           id="any-category">
                                <label class="checkbox_label" for="any-category">Любая</label>
                                </div>
                                <div class="checkbox_block" v-for="(categoryName) in allCategories">
                                    <input type="radio"
                                           name="category"
                                           :value="categoryName.name"
                                           class="checkbox_input"
                                           v-model="category"
                                           :id="categoryName.name">
                                    <label class="checkbox_label" :for="categoryName.name">{{categoryName.name}}</label>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="price">
                            <label class="fieldset_title" for="price">Цена</label>

                            <div class="radio_wrapper">

                                <div class="mod_column-left">
                                    <input checked type="radio"
                                           name="price" value=""
                                           class="checkbox_input"
                                           v-model="price"
                                           id="any-price">
                                    <label class="checkbox_label" for="any-price">Не важно</label>
                                    <div class="checkbox_block" v-for="(priceRange , key, i) in prices"
                                         v-if="i < Object.keys(prices).length">
                                        <input type="radio"
                                               name="price"
                                               v-model="price"
                                               :value="priceRange"
                                               class="checkbox_input"
                                               :id="priceRange">
                                        <label class="checkbox_label"
                                               :for="priceRange">{{key}}</label>
                                    </div>
                                </div>


                                <div class="mod_column-right">
                                    <div class="checkbox_block" v-for="(priceRange , key, i) in prices"
                                         v-if="(i >= Object.keys(prices).length)">
                                        <input type="radio"
                                               name="price"
                                               :value="priceRange"
                                               v-model="price"
                                               class="checkbox_input"
                                               :id="priceRange">
                                        <label class="checkbox_label"
                                               :for="priceRange">{{key}}</label>
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="children-accessibility">
                            <label class="fieldset_title" for="children-accessibility"><span>Доступно </span><span>для
                        детей</span></label>
                            <div class="select-wrapper">
                                <select class="filter_select" v-model="children_accessibility"
                                        name="children_accessibility">
                                    <option class="filter_option" value="">Не важно</option>
                                    <option class="filter_option" value="1">Доступно</option>
                                    <option class="filter_option" value="0">Не доступно</option>
                                </select>
                                <svg class="filter_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>

                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="recommended">
                            <label class="fieldset_title" for="recommended">Рекомендованные туры</label>
                            <div class="radio_wrapper">
                                <input type="checkbox" name="recommended" v-model="recommended" value="1"
                                       class="checkbox_input"
                                       id="recommended-checkbox">
                                <label class="checkbox_label" for="recommended-checkbox">Показать
                                </label>
                            </div>
                        </fieldset>

                        <fieldset class="filter_fields fieldset" id="hot">
                            <label class="fieldset_title" for="hot">Горящие туры</label>
                            <div class="radio_wrapper">
                                <input type="checkbox" v-model="hot" name="hot" value="1" class="checkbox_input"
                                       id="hot-checkbox">
                                <label class="checkbox_label" for="hot-checkbox">Выбрать горящие</label>

                            </div>
                        </fieldset>

                        <input class="hiddenInput" type="hidden" name="search" value="">
                    </form>
                </aside>
            </div>

            <div class="main-content_wrapper">
                <section class="products-filter">
                    <p v-if="!filterToggler" @click="filterToggle" class="products-filter_toggler">Показать фильтр</p>
                    <div class="products-filter_info">
                        <span class="products-filter_count">{{paginator.total}} шт</span>
                        <div class="products-filter_sorter">
                            <select class="products-filter_select" name="sorter" form="filter-form">
                                <option class="products-filter_option" value="created_at">По умолчанию</option>
                                <option class="products-filter_option" value="price">По цене</option>
                                <option class="products-filter_option" value="start_at">По дате старта</option>
                            </select>

                            <svg class="products-filter_icon">
                                <use xlink:href="#selector"></use>
                            </svg>

                        </div>
                    </div>
                    <div class="products-filter_display">
                        <ul class="products-filter_list">
                        </ul>
                        <div @click="filterReset" class="products-filter_reset">
                            <a class="products-filter_reset-link" href="#">
                                <span>Очистить фильтр</span>
                                <span class="dell-them-all">
                    <svg class="filter-cleaner_icon">
                    <use xlink:href="#close"></use>
                    </svg>
                    </span>
                            </a>
                        </div>

                    </div>
                </section>
                <products @sendpage="changepage" :searchpage=searchpage :tours=searchTours></products>

            </div>
        </div>
    </div>
</template>
<style lang="scss">
    .checkbox_block {
        margin-bottom: 16px;
    }

    .fieldset {
        padding-bottom: 16px;
    }
</style>

<script src="./search.js"></script>
