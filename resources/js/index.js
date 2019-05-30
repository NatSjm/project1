//menu


//about_button

// $(".about_button").click(function(e){
//     e.preventDefault();
//     $(this).css("display", "none");
//
//     let newHeight = $(".about_info")[0].scrollHeight;
//     $(".about_info").addClass("mod_full-size").height(newHeight);
// });


//filter



// var form = $('.filter_form');
// var select = $('.filter_select');
// var input = $('.checkbox_input');
// var productsFilterList = $('.products-filter_list');
// var filterCleaner = $('.dell-them-all');
// var index = 0;
//
//
//
// function FilterItem(name, text, value, className, index) {
//     this.name = name;
//     this.text = text;
//     this.value = value;
//     this.index = index;
//     this.className = className;
// }
//
//
// form.on('change', 'select, input', function (e) {
//     var target = $(e.target);
//
//     var className = target.attr("class");
//     var name = target.attr('name');
//
//     if (className == 'filter_select') {
//         var option = $(e.target).children(':selected');
//         var text = option.text();
//         var value = option.val();
//     } else if (className == 'checkbox_input') {
//         var label = target.next();
//         var text = label.text();
//         var value = target.val();
//     }
//
//     if (value !== '') {
//         var filterItem = new FilterItem(name, text, value, className, index++);
//         Collection.add(filterItem);
//     }else{
//         Collection.removeFilterItem(name);
//     }
//     console.log(filterItem);
//
//
//
// });
//
// filterCleaner.click(function () {
//     select.children(':selected').prop('selected', false);
//     input.filter(':checked').prop('checked', false);
//     Collection.dellAll();
//
// });
//
// function Delete(e) {
//
//     if(e.data.className == 'filter_select'){
//          let cleanedSelect = $('select[name=' + e.data.name + '] option:selected');
//          cleanedSelect.prop('selected', false);
//     }else if(e.data.className == 'checkbox_input'){
//         let cleanedInput = $('input[name=' + e.data.name + ']:checked');
//         cleanedInput.prop('checked', false);
//     }
//
//     Collection.removeFilterItem(e.data.name);
//
//
// }
//
//
//
// function SetSelected(filterList){
//     filterList.forEach(function(item) {
//         if(item.className == 'filter_select'){
//             let selected = $('select[name=' + item.name + '] option[value=' + item.value + ']');
//             selected.prop('selected', true);
//         }else if(item.className == 'checkbox_input'){
//             let selected = $('input[name=' + item.name + '][value =' + item.value + ']');
//            selected.prop('checked', true);
//         }
//
//     });
// }
//
//
// var Collection = {
//     filterList: [],
//
//     init: function () {
//         if (Storage.has('filterList')) {
//             this.filterList = Storage.get('filterList');
//             this.renderAll();
//             SetSelected(this.filterList);
//         }
//     },
//
//
//
//     add: function (filterItem) {
//
//         var names = this.filterList.map(function (obj) {
//             return obj.name;
//         });
//
//         var dubbedNameIndex = names.indexOf(filterItem['name']);
//
//         if (dubbedNameIndex == -1) {
//             this.filterList.push(filterItem);
//             this.renderFilterItem(filterItem);
//
//         } else {
//             this.update(filterItem, dubbedNameIndex);
//         }
//
//         Storage.add('filterList', this.filterList);
//
//
//     },
//
//     update: function (filterItem, dubbedNameIndex) {
//         this.filterList.splice(dubbedNameIndex, 1, filterItem);
//         this.renderAll();
//         console.log(this.filterList);
//     },
//
//     removeFilterItem: function (name) {
//         this.filterList = this.filterList.filter(function (item) {
//             return item.name != name;
//         });
//         Storage.add('filterList', this.filterList);
//         console.log(this.filterList);
//         this.renderAll();
//
//     },
//
//
//     renderFilterItem: function (filterItem) {
//
//         var li = $('<li></li>')
//             .addClass('products-filter_item');
//
//
//         li.html("<span class='products-filter_text'>" + filterItem.text
//             + "</span><span class='item-cleaner'>"
//             + "<svg class ='filter-cleaner_icon'>"
//             + "<use xlink:href='#close'></use></svg></span>");
//
//         li.on('click', '.item-cleaner', filterItem, Delete);
//         productsFilterList.append(li);
//     },
//
//     renderAll: function () {
//         productsFilterList.empty();
//         for (let i = 0; i < this.filterList.length; i++) {
//             this.renderFilterItem(this.filterList[i]);
//         }
//     },
//
//     dellAll: function () {
//         this.filterList = [];
//         Storage.remove('filterList');
//         productsFilterList.empty();
//     }
// };
// Collection.init();
//













