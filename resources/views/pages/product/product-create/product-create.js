let $fotoInput = $(".img-uploader_input");

$(".img-fieldset_container").on("change", $fotoInput, function (e) {
    let changedMedia = e.target.dataset.index;
    let $changed = $(e.target);
    let $hidden = $changed.next();
    $hidden.val(changedMedia);


    let fotoInputId = (e.target.id);
    let $fotoLabel = $(".img-uploader_title[for='" + fotoInputId + "']");
    if (e.target.files[0]) {
        let fr = new FileReader();
        fr.addEventListener("load", function () {
            $fotoLabel.css("backgroundImage", "url(" + fr.result + ")");
        }, false);

        fr.readAsDataURL(e.target.files[0]);
    }

});



