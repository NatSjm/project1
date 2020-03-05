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
                                   value=""
                                   :class="{invalid: $v.newTour.name.$error}"
                                   @blur="$v.newTour.name.$touch()">
                            <div v-if="$v.newTour.name.$error">
                                <p class="product-select_error-message"
                                   v-if="!$v.newTour.name.required">
                                    Введите название объявления</p>
                            </div>
                        </div>
                        <div class="product-form_select-group">
                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="country">Страна</label>
                                <div class="select-wrapper" :class="{invalid: $v.newTour.country_id.$error}">
                                    <select v-model="newTour.country_id"
                                            class="product-select_select select"
                                            name="country_id"
                                            id="country"
                                            @blur="$v.newTour.country_id.$touch()">
                                        <option class="product-select_option" value="">Укажите страну
                                            отдыха
                                        </option>

                                        <option v-for="country in allCountryNames"
                                                :key="country.id"
                                                class="product-select_option"
                                                :value="country.id">{{country.name}}
                                        </option>

                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                                <div v-if="$v.newTour.country_id.$error">
                                    <p class="product-select_error-message"
                                       v-if="!$v.newTour.country_id.required">
                                        Выберите страну</p>
                                </div>
                            </div>
                            <div class="product-form_select product-select">
                                <label class="product-select_title" for="hotel-class">Класс отеля</label>
                                <div class="select-wrapper" :class="{invalid: $v.newTour.hotel_id.$error}">
                                    <select class="product-select_select select " v-model="newTour.hotel_id"
                                            name="hotel_id"
                                            id="hotel-class"
                                            @blur="$v.newTour.hotel_id.$touch()">
                                        <option class="product-select_option" value="">Укажите класс отеля</option>
                                        <option v-for="hotel in allHotels" :key="hotel.id" class="product-select_option"
                                                :value="hotel.id">{{ hotel.hotelClass }}
                                            <sup>*</sup></option>
                                    </select>
                                    <svg class="product-select_icon select_icon">
                                        <use xlink:href="#selector"></use>
                                    </svg>
                                </div>
                                <div v-if="$v.newTour.hotel_id.$error">
                                    <p class="product-select_error-message"
                                       v-if="!$v.newTour.hotel_id.required">
                                        Укажите тип отеля</p>
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
                                   id="start-date"
                                   :class="{invalid: $v.start_at.$error}"
                                   @blur="$v.start_at.$touch()">
                            <div v-if="$v.start_at.$error">
                                <p class="product-select_error-message"
                                   v-if="!$v.start_at.required">
                                    Укажите дату начала тура</p>
                            </div>
                        </div>

                        <div class="product-form_select product-select mod_date ">
                            <label class="product-select_title" for="finish-date">Дата окончания тура </label>
                            <input type="date" class="product-select_input input mod_date"
                                   name="finish_at"
                                   value=""
                                   v-model="finish_at"
                                   id="finish-date"
                                   :class="{invalid: $v.finish_at.$error}"
                                   @blur="$v.finish_at.$touch()">
                            <div v-if="$v.finish_at.$error">
                                <p class="product-select_error-message"
                                   v-if="!$v.finish_at.required">
                                    Укажите дату окончания тура</p>
                            </div>
                        </div>

                    </div>

                    <div class="product-form_select product-select">
                        <label class="product-select_title" for="tour-cat">Категория тура</label>
                        <div class="select-wrapper" :class="{invalid: $v.newTour.category_id.$error}">
                            <select v-model="newTour.category_id" class="product-select_select select"
                                    name="category_id"
                                    id="tour-cat"
                                    @blur="$v.newTour.category_id.$touch()">
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
                        <div v-if="$v.newTour.category_id.$error">
                            <p class="product-select_error-message"
                               v-if="!$v.newTour.category_id.required">
                                Укажите категорию</p>
                        </div>
                    </div>

                    <div class="product-form_select-group">
                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="category">Тип тура</label>
                            <div class="select-wrapper" :class="{invalid: $v.newTour.tour_type_id.$error}">
                                <select v-model="newTour.tour_type_id" class="product-select_select select"
                                        name="tour_type_id"
                                        id="category"
                                        @blur="$v.newTour.tour_type_id.$touch()">
                                    <option class="product-select_option" value="">Укажите тип тура</option>
                                    <option v-for=" tourType in allTourTypes" :key="tourType.id"
                                            class="filter_option"
                                            :value="tourType.id">{{tourType.name}}
                                    </option>
                                </select>
                                <svg class="product-select_icon select_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                            <div v-if="$v.newTour.tour_type_id.$error">
                                <p class="product-select_error-message"
                                   v-if="!$v.newTour.tour_type_id.required">
                                    Укажите тип тура</p>
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
                                   id="price"
                                   :class="{invalid: $v.newTour.price.$error}"
                                   @blur="$v.newTour.price.$touch()">
                            <div v-if="$v.newTour.price.$error">
                                <p class="product-select_error-message"
                                   v-if="!$v.newTour.price.required">
                                    Укажите цену</p>
                            </div>
                        </div>

                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="food">Питание</label>
                            <div class="select-wrapper"  :class="{invalid: $v.newTour.nutrition_id.$error}">
                                <select v-model="newTour.nutrition_id" class="product-select_select select"
                                        name="nutrition_id"
                                        id="food"
                                        @blur="$v.newTour.nutrition_id.$touch()">
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
                            <div v-if="$v.newTour.nutrition_id.$error">
                                <p class="product-select_error-message"
                                   v-if="!$v.newTour.nutrition_id.required">
                                    Укажите тип питания</p>
                            </div>
                        </div>

                        <div class="product-form_select product-select">
                            <label class="product-select_title" for="children-accessibility">Доступно для
                                детей</label>
                            <div class="select-wrapper" :class="{invalid: $v.newTour.for_children.$error}">
                                <select class="product-select_select select"
                                        name="for_children"
                                        v-model="newTour.for_children"
                                        id="children-accessibility"
                                        @blur="$v.newTour.for_children.$touch()">
                                    <option class="product-select_option" value=""></option>
                                    <option class="product-select_option" value="1">Да</option>
                                    <option class="product-select_option" value="0">Нет</option>
                                </select>
                                <svg class="product-select_icon select_icon">
                                    <use xlink:href="#selector"></use>
                                </svg>
                            </div>
                            <div v-if="$v.newTour.for_children.$error">
                                <p class="product-select_error-message"
                                   v-if="!$v.newTour.for_children.required">
                                    Укажите доступность для детей</p>
                            </div>
                        </div>
                    </div>

                    <div class="product-form_select product-select">
                        <label class="product-select_title" for="start-location">Место отправления</label>
                        <div class="select-wrapper"  :class="{invalid: $v.newTour.start_location_id.$error}">
                            <select v-model="newTour.start_location_id"
                                    class="product-select_select select"
                                    name="start_location_id"
                                    id="start-location"
                                    @blur="$v.newTour.start_location_id.$touch()">
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
                        <div v-if="$v.newTour.start_location_id.$error">
                            <p class="product-select_error-message"
                               v-if="!$v.newTour.start_location_id.required">
                                Укажите место отправления</p>
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
                               for="foto"><span>Основное</span><span>фото</span></label>
                    </div>
                    <div v-for="i in 9" :key="i" class="img-uploader">
                        <input class="img-uploader_input" name="media_id[]" v-bind:id="'foto'+ i" title=""
                               type="file">
                        <label class="img-uploader_title" v-bind:for="'foto'+i"></label>
                    </div>
                </div>
            </fieldset>

            <input type="submit"
                   class="button mod_color-med-blue product-form_submit"
                   :disabled="$v.$invalid"
                   value="Отправить изменения">
            <p class="product-form_error-message"
               v-if="$v.$anyError">
                Заполните необходимые поля</p>

        </form>
    </div>

</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import {required} from 'vuelidate/lib/validators';

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
            }
        },
        computed: {
            ...mapGetters([
                'allCountryNames',
                'allHotels',
                'allNutritionTypes',
                'allCategories',
                'allTourTypes',
                'allLocations',
            ])
        },
        methods: {
            ...mapActions([
                'createTour'
            ]),
            sendNewTour() {
                 this.$v.$touch();
                   if (!this.$v.invalid) {
                let formData = new FormData();
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

                this.createTour(formData).then((responce) => {
                    this.$router.push({name: 'product-page', params: {id: responce.data}});
                });
                   }
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
                    }

                }
            },
        },

        validations: {
            newTour: {
                name: {required},
                country_id: {required},
                hotel_id: {required},
                category_id: {required},
                tour_type_id: {required},
                price: {required},
                nutrition_id: {required},
                for_children: {required},
                start_location_id: {required},
            },
            start_at: {required},
            finish_at: {required},
        }
    }
</script>

