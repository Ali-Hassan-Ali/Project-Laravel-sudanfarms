// image preview logo
$("#company-logo").change(function () {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.company-logo').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});


// image preview certificate
$("#company-certificate").change(function () {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.company-certificate').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }

});
