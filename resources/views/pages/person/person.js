


document.querySelector(".person_img").addEventListener("change", function () {
    if (this.files[0]) {
        var fr = new FileReader();

        fr.addEventListener("load", function () {
            document.querySelector(".person_img-title").style.backgroundImage = "url(" + fr.result + ")";
        }, false);

        fr.readAsDataURL(this.files[0]);
    }
});
l