var switcher = $('.js_details-switcher');
switcher.click(function(e){
    e.preventDefault();
    let order =  $(this).closest('.order');
    order.toggleClass('mod_opened');
    order.next().find('.order_items-wrapper').slideToggle();

});

