$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//$('body').css('background-color','red');
$(document).ready(function(){
    $(".hamburger").click(function (e) {
        e.preventDefault();
        $(this).toggleClass("is-active");
    });
});
