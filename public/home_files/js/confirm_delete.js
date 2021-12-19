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

        var id = $(this).data('id');
        alert('aSome');


    });//end of change

});//end of document redy