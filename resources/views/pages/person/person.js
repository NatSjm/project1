


document.querySelector(".person_img").addEventListener("change", function () {
    if (this.files[0]) {
        var fr = new FileReader();

        fr.addEventListener("load", function () {
            document.querySelector(".person_img-title").style.backgroundImage = "url(" + fr.result + ")";
        }, false);

        fr.readAsDataURL(this.files[0]);
    }
});


let avatar = $('.person_img-title');

function  avatarResiser() {
    if (window.matchMedia("screen and (max-width: 1279px)").matches) {
        avatar.css("width", "100%");
        avatar.height(avatar.width());
    } else {
       avatar.height(180);
       avatar.width(180);
    }
}

avatarResiser();

$(window).resize(avatarResiser);