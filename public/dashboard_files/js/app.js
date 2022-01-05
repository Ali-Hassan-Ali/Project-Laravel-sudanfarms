$(document).ready(function () {
	
    $('.sidebar-menu').tree();

    //icheck
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });

    //delete
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

    });//end of delete

   $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
      var src = $(this).attr('src');
      var modal;

      function removeModal() {
        modal.remove();
        $('body').off('keyup.modal-close');
      }
      modal = $('<div>').css({
        background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
        backgroundSize: 'contain',
        width: '100%',
        height: '100%',
        position: 'fixed',
        zIndex: '10000',
        top: '0',
        left: '0',
        cursor: 'zoom-out'
      }).click(function() {
        removeModal();
      }).appendTo('body');
      //handling ESC
      $('body').on('keyup.modal-close', function(e) {
        if (e.key === 'Escape') {
          removeModal();
        }
      });
    });//end of data full screen image

    CKEDITOR.config.language =  "{{ app()->getLocale() }}";

});//end of ready