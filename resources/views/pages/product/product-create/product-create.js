document.querySelector(".img-uploader_input.mod_main").addEventListener("change", function () {
    if (this.files[0]) {
        var fr = new FileReader();

        fr.addEventListener("load", function () {
            document.querySelector(".img-uploader_title.mod_main").style.backgroundImage = "url(" + fr.result + ")";
        }, false);

        fr.readAsDataURL(this.files[0]);
    }
});
