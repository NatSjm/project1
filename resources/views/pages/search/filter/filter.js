
require('./filter-toggler');

import Storage from './../../../../js/storage';






var Collection = {
    filterList: [],
    productsFilterList: $('.products-filter_list'),
    index: 0,


    init: function () {

        var $form = $('.filter_form');
        var $select = $('.filter_select');
        var $input = $('.checkbox_input');
        var $filterCleaner = $('.products-filter_reset');




        if (Storage.has('filterList')) {
            this.filterList = Storage.get('filterList');
            this.renderAll();
            this.SetSelected();
        }

        $form.on('change', ($select, $input), ((this.formEventHandler).bind(this)));

        $filterCleaner.click(function () {
            $select.children(':selected').prop('selected', false);
            $input.filter(':checked').prop('checked', false);
            this.dellAll();

        }.bind(this));


    },

    SetSelected: function () {
        this.filterList.forEach(function (item) {
            if (item.className === 'filter_select') {
                let selected = $('select[name=' + item.name + '] option[value=' + item.value + ']');
                selected.prop('selected', true);
            } else if (item.className === 'checkbox_input') {
                let selected = $('input[name=' + item.name + '][value =' + item.value + ']');
                selected.prop('checked', true);
            }

        });
    },


    add: function (filterItem) {

        var names = this.filterList.map(function (obj) {
            return obj.name;
        });

        var dubbedNameIndex = names.indexOf(filterItem['name']);

        if (dubbedNameIndex === -1) {
            this.filterList.push(filterItem);
            this.renderFilterItem(filterItem);

        } else {
            this.update(filterItem, dubbedNameIndex);
        }

        Storage.add('filterList', this.filterList);
        console.log(filterItem);

    },

    update: function (filterItem, dubbedNameIndex) {
        this.filterList.splice(dubbedNameIndex, 1, filterItem);
        this.renderAll();

    },

    removeFilterItem: function (name) {
        this.filterList = this.filterList.filter(function (item) {
            return item.name !== name;
        });
        Storage.add('filterList', this.filterList);

        this.renderAll();

    },


    renderFilterItem: function (filterItem) {

        var li = $('<li></li>')
            .addClass('products-filter_item');


        li.html("<span class='products-filter_text'>" + filterItem.text
            + "</span><span class='item-cleaner'>"
            + "<svg class ='filter-cleaner_icon'>"
            + "<use xlink:href='#close'></use></svg></span>");

        li.on('click', filterItem, (this.deleteEventHandler.bind(this)));
        this.productsFilterList.append(li);
    },

    deleteEventHandler: function (e) {

        if (e.data.className === 'filter_select') {
            let cleanedSelect = $('select[name=' + e.data.name + '] option:selected');
            cleanedSelect.prop('selected', false);
        } else if (e.data.className === 'checkbox_input') {
            let cleanedInput = $('input[name=' + e.data.name + ']:checked');
            cleanedInput.prop('checked', false);
        }

        this.removeFilterItem(e.data.name);


    },


    renderAll: function () {
        this.productsFilterList.empty();
        for (let i = 0; i < this.filterList.length; i++) {
            this.renderFilterItem(this.filterList[i]);
        }
    },

    dellAll: function () {
        this.filterList = [];
        Storage.remove('filterList');
        this.productsFilterList.empty();
    },

    FilterItem: function (name, text, value, className, index) {
        this.name = name;
        this.text = text;
        this.value = value;
        this.index = index;
        this.className = className;
    },


    formEventHandler: function (e) {
        var target = $(e.target);

        var className = target.attr("class");
        var name = target.attr('name');

        if (className === 'filter_select') {
            var option = $(e.target).children(':selected');
            var text = option.text();
            var value = option.val();
        } else if (className === 'checkbox_input') {
            var label = target.next();
            var text = label.text();
            var value = target.val();
        }
        if (value !== '') {
            var filterItem = new this.FilterItem(name, text, value, className, this.index++);
            this.add(filterItem);
        } else {
            this.removeFilterItem(name);
        }
    },


};

Collection.init();



