$(document).ready(function() {

    $('.delete').click(function (e) {

        var that = $(this)

        e.preventDefault();

        var n = new Noty({
            text: "@lang('dashboard.confirm_delete')",
            type: "warning",
            killer: true,
            buttons: [
                Noty.button("@lang('dashboard.yes')", 'btn btn-success mr-2', function () {
                    that.closest('form').submit();
                }),

                Noty.button("@lang('dashboard.no')", 'btn btn-primary mr-2', function () {
                    n.close();
                })
            ]
        });

        n.show();

    });//end of confirm_delete

    $(document).on('change', '#category-dealer-id', function (e) {
        e.preventDefault();

        var id = $(this).find(':selected').data('id');

        if (id == 1) {

            $('#company-certificate').addClass('d-none');

        } else {

            $('#company-certificate').removeClass('d-none');

        }//end of if

    });//end of change

});//end of document redy