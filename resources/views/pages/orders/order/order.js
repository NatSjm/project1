// var switcher = $('.js_details-switcher');
// switcher.click(function(e){
//     e.preventDefault();
//     let order =  $(this).closest('.order');
//     order.toggleClass('mod_opened');
//     order.next().find('.order_items-wrapper').slideToggle();
//
// });

var $switcher = $('.order');
$switcher.click(function(e){
    let others = $switcher.not($(this));

    if (others.hasClass('mod_opened')){
        others.removeClass('mod_opened');
        others.next().find('.order_items-wrapper').slideUp();
    }

    $(this).toggleClass('mod_opened');
    $(this).next().find('.order_items-wrapper').slideToggle();

});

