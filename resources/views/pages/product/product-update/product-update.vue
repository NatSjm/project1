<template>
    <div class="product-create-page_wrapper cont">
        <div class="product-create-page_breadcrumbs">
            <breadcrumbs></breadcrumbs>

        </div>
        <h2 class="headline-2 product-create-page_title page-title">Новое объявление </h2>
        <form action="" @submit.prevent="sendNewTour" class="product-create-page_form product-form"
              enctype="multipart/form-data" method="post">

            <div class="product-form_fieldset-wrapper">
                <fieldset class="product-form_fieldset mod_border-grey">
                    <div class="product-form_selectwrapper">
                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="product-name">Название объявления</label>
                            <input type="text"
                                   class="input product-select_input"
                                   placeholder="Введите название объявления"
                                   name="name"
                                   id="product-name"
                                   v-model="newTour.name"
                                   value="">
                        </div>
                        <div class="product-form_select-group">
                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="country">Страна</label>
                                <div class="select-wrapper">
                                    <select v-model="newTour.country_id"

                                            class="product-select_select select"
                                            name="country_id"
                                            id="country">
                                        <option class="product-select_option" value="">Укажите страну
                                            отдыха
                                        </option>

                                        <option v-for="country in allCountryNames"
                                                :key="country.id"
                                                v-bind:selected="country.name === tour.shortCountryName"
                                                class="product-select_option"
                                                :value="country.id">{{country.name}}
                                        </option>

                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="hotel-class">Класс отеля</label>
                                <div class="select-wrapper">
                                    <select class="product-select_select select " v-model="newTour.hotel_id"
                                            name="hotel_id"
                                            id="hotel-class">
                                        <option class="product-select_option" value="">Укажите класс отеля</option>
                                        <option v-for="hotel in allHotels" :key="hotel.id" class="product-select_option"
                                                :value="hotel.id">{{ hotel.hotelClass }}
                                            <sup>*</sup></option>
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-form_select-group">

                        <div class="product-form_select product-select ">
                            <label class="product-select_title" for="start-date">Дата начала тура</label>
                            <input type="date" class="product-select_input input mod_date"
                                   name="start_at"
                                   v-model="start_at"
                                   value=""
                                   id="start-date">
                        </div>

                        <div class="product-form_select product-select mod_date ">
                            <label class="product-select_title" for="finish-date">Дата окончания тура </label>
                            <input type="date" class="product-select_input input mod_date"
                                   name="finish_at"
                                   value=""
                                   v-model="finish_at"
                                   id="finish-date">
                        </div>

                    </div>

                    <div class="product-form_select product-select">
                        <label class="product-select_title" for="tour-cat">Категория тура</label>
                        <div class="select-wrapper">
                            <select v-model="newTour.category_id" class="product-select_select select"
                                    name="category_id"
                                    id="tour-cat">
                                <option class="product-select_option" value="">Укажите категорию тура</option>
                                <option v-for="categoryName in allCategories" :key="categoryName.id"
                                        class="product-select_option"
                                        :value="categoryName.id">{{ categoryName.name }}
                                </option>
                            </select>
                            <svg class="product-select_icon select_icon">
                                <use xlink:href="#selector"></use>
                            </svg>
                        </div>
                    </div>

                    <div class="product-form_select-group">
                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="category">Тип тура</label>
                            <div class="select-wrapper">
                                <select v-model="newTour.tour_type_id" class="product-select_select select"
                                        name="tour_type_id"
                                        id="category">
                                    <option class="product-select_option" value="">Укажите категорию</option>
                                    <option v-for=" tourType in allTourTypes" :key="tourType.id"
                                            class="filter_option"
                                            :value="tourType.id">{{tourType.name}}
                                    </option>
                                </select>
                                <svg class="product-select_icon select_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                        </div>

                        <div class="product-form_select product-select mod_price">
                            <label class="product-select_title" for="price">Цена</label>
                            <input type="text"
                                   placeholder="Укажите цену"
                                   v-model="newTour.price"
                                   class="product-select_input  input"
                                   name="price"
                                   value=""
                                   id="price">
                        </div>

                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="food">Питание</label>
                            <div class="select-wrapper">
                                <select v-model="newTour.nutrition_id" class="product-select_select select"
                                        name="nutrition_id"
                                        id="food">
                                    <option class="product-select_option " value="">Укажите питание в
                                        туре
                                    </option>

                                    <option v-for="nutritionType in allNutritionTypes"
                                            :key="nutritionType.id"
                                            class="product-select_option"
                                            :value="nutritionType.id">{{nutritionType.nutritionType}}
                                    </option>

                                </select>
                                <svg class="product-select_icon select_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                        </div>

                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="children-accessibility">Доступно для
                                детей</label>
                            <div class="select-wrapper">
                                <select class="product-select_select select"
                                        name="for_children"
                                        v-model="newTour.for_children"
                                        id="children-accessibility">
                                    <option class="product-select_option" value=""></option>
                                    <option class="product-select_option" value="1">Да</option>
                                    <option class="product-select_option" value="0">Нет</option>
                                </select>
                                <svg class="product-select_icon select_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="product-form_select product-select">
                        <label class="product-select_title" for="start-location">Место отправления</label>
                        <div class="select-wrapper">
                            <select v-model="newTour.start_location_id"
                                    class="product-select_select select"
                                    name="start_location_id"
                                    id="start-location">
                                <option class="product-select_option" value="">Укажите место отправления</option>
                                <option v-for="location in allLocations"
                                        :key="location.id"
                                        class="product-select_option"
                                        :value="location.id">{{location.city}}, {{location.name}}
                                </option>
                            </select>
                            <svg class="product-select_icon select_icon">
                                <use xlink:href="#selector"></use>
                            </svg>
                        </div>
                    </div>
                </fieldset>


                <fieldset class="product-form_fieldset mod_border-grey textarea" id="textarea">

                    <label for="textarea" class="textarea_title">Комментарий</label>

                    <textarea placeholder="Опишите ваш товар"
                              name="description"
                              value=""
                              v-model="newTour.description"
                              class="input textarea_input"></textarea>

                </fieldset>

            </div>

            <fieldset class="product-form_fieldset img-fieldset mod_border-grey" id="foto-fieldset">
                <label class="img-fieldset_title" for="foto-fieldset">Фотографии</label>
                <div class="img-fieldset_container" @change="onFileSelected">
                    <div class="img-uploader">
                        <input class="img-uploader_input mod_main" id="foto" name="main_img_id" title="" type="file">
                        <label class="img-uploader_title mod_main"
                               :style="{'background-image':`url('/storage/images/${tour.mainImg}')`}"
                               for="foto"><span>Основное</span><span>фото</span></label>
                    </div>
                    <div v-for="media  in tour.medias" :key="media.id" class="img-uploader">
                        <input class="img-uploader_input"
                               name="media_id[]"
                               :data-index="media.id"
                               v-bind:id="'foto'+ media.id"
                               title=""
                               type="file">

                        <label class="img-uploader_title"
                               v-bind:for="'foto'+media.id"
                               :style="{'background-image':`url('/storage/images/${media.path}')`}">

                        </label>
                    </div>

                    <div v-for="i in emptyLabelsQuantity" class="img-uploader">
                        <input class="img-uploader_input" name="media_id[]" :id="'newFoto' + i " title=""
                               type="file">
                        <label class="img-uploader_title" :for="'newFoto' + i "></label>
                    </div>
                </div>
            </fieldset>

            <input type="submit" class="button mod_color-med-blue product-form_submit"
                   value="Отправить изменения">

        </form>
    </div>

</template>

<script>
    import {mapGetters, mapActions} from 'vuex'


    export default {
        data: function () {
            return {
                newTour: {
                    name: '',
                    country_id: '',
                    hotel_id: '',
                    category_id: '',
                    tour_type_id: '',
                    price: '',
                    nutrition_id: '',
                    for_children: '',
                    start_location_id: '',
                    description: '',
                },
                media_id: [],
                main_img_id: null,
                start_at: '',
                finish_at: '',
                emptyLabelsQuantity: 9,
                changedMediaIds: [],
            }
        },
        computed: {
            ...mapGetters([
                'tour',
                'allCountryNames',
                'allHotels',
                'allNutritionTypes',
                'allCategories',
                'allTourTypes',
                'allLocations',
            ]),
            forChildrenCode() {
                switch (this.tour.for_children) {
                    case 'Нет':
                        return ('0');
                        break;
                    case 'Да':
                        return ('1');
                        break;
                    default:
                        return ('');
                }
            },

        },
        created() {
            this.getItemsForProduct(this.$route.params.id).then(() => {
                this.newTour.name = this.tour.name;
                this.newTour.country_id = this.tour.countryId;
                this.newTour.hotel_id = this.tour.hotelId;
                this.start_at = this.tour.startAt;
                this.finish_at = this.tour.finishAt;
                this.newTour.category_id = this.tour.categoryId;
                this.newTour.tour_type_id = this.tour.tourTypeId;
                this.newTour.price = this.tour.price;
                this.newTour.nutrition_id = this.tour.nutritionId;
                this.newTour.for_children = this.forChildrenCode;
                this.newTour.start_location_id = this.tour.startLocationId;
                this.newTour.description = this.tour.description;
                this.emptyLabelsQuantity = 9 - this.tour.medias.length;
            });
        },
        methods: {
            ...mapActions([
                'updateTour',
                'getItemsForProduct'
            ]),
            sendNewTour() {

                let formData = new FormData();
                formData.append("_method", 'PATCH');

                for (let key in this.newTour) {
                    formData.append(key, this.newTour[key]);
                }

                formData.append('start_at', this.start_at);
                formData.append('finish_at', this.finish_at);

                if (this.main_img_id) {
                    formData.append('main_img_id', this.main_img_id);
                }
                if (this.media_id.length) {
                    for (let i = 0; i < this.media_id.length; i++) {
                        formData.append('media_id[' + i + ']', this.media_id[i]);
                    }
                }
                if (this.changedMediaIds.length) {
                    for (let i = 0; i < this.changedMediaIds.length; i++) {
                        formData.append('changedMediaIds[' + i + ']', this.changedMediaIds[i]);
                    }
                }

                let payload = {
                    id: this.$route.params.id,
                    params: formData
                };


                this.updateTour(payload).then((responce) => {
                    this.$router.push({name: 'product-page', params: {id: responce.data}});
                });


            },

            onFileSelected(e) {
                let fotoInputId = (e.target.id);
                let $fotoLabel = $(".img-uploader_title[for='" + fotoInputId + "']");
                if (e.target.files[0]) {
                    let fr = new FileReader();
                    fr.addEventListener("load", function () {
                        $fotoLabel.css("backgroundImage", "url(" + fr.result + ")");
                    }, false);
                    fr.readAsDataURL(e.target.files[0]);
                    if (fotoInputId === 'foto') {
                        this.main_img_id = e.target.files[0];
                    }
                    else {
                        this.media_id.push(e.target.files[0]);
                        if (e.target.dataset.index) {
                            this.changedMediaIds.push(e.target.dataset.index);
                        }

                    }

                }
            },


        },

    }
</script>

<style scoped>

</style>
