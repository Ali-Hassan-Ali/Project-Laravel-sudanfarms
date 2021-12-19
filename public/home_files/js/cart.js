$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });//end if ajax sutup

    $(document).on('click','.add-cart', function(e){
        e.preventDefault();
        
        var id      = $(this).data('id');
        var url     = $(this).data('url');
        var method  = 'post';
        
        $.ajax({
            url: url,
            method: method,
            data:{id: id},
            success: function(data) {

                swal('add success', {
                    type: "success",
                    icon: "success",
                    buttons: false,
                    timer: 3000,
                    timer: 15000
                });

                var item =  '<li class="cart-item">'+
                                '<div class="cart-media">'+
                                    '<a href="#">'+
                                        '<img src="'+data.image_product.image_path+'" alt="Product">'+
                                    '</a>'+
                                    '<button class="cart-delete">'+
                                        '<i class="far fa-trash-alt"></i>'+
                                    '</button>'+
                                '</div>'+
                                '<div class="cart-info-group">'+
                                '<div class="cart-info">'+
                                    '<h6><a href="4">name ar</a></h6>'+
                                    '<p class="product-qty-4"> '+data.product.name+' - '+data.product.price+' '+data.currency+'</p>'+
                                '</div>'+
                                '<div class="cart-action-group">'+
                                    '<div class="product-action">'+
                                        '<button class="action-minus" title="نقصان الكيمة">'+
                                            '<i class="icofont-minus"></i>'+
                                        '</button>'+
                                        '<input class="action-input" title="Quantity Number" type="text" name="quantity" value="'+data.product.qty+'" spellcheck="false" data-ms-editor="true">'+
                                        '<button class="action-plus" title="زيادة الكمية">'+
                                            '<i class="icofont-plus"></i>'+
                                        '</button>'+
                                    '</div>'+
                                    '<h6>'+data.currency+' '+ data.product.qty * data.product.price+'</h6>'+
                                '</div>'+
                            '</li>';

                $('#add-cart-product').append(item);
                $('.no-data').remove();
                $('.cart-count').html(data.count);
                $('.cart-totle').html(data.subtotal);


            }, error: function(data) {
                console.log(data);
            },

        });//end of ajax

    });//end of click

    $('.product-quntty-up').on('click', function(e) {
    	e.preventDefault();

    	var id     = $(this).data('id');
        var rowId  = $(this).data('rowid');
        var url    = $(this).data('url');
    	var method = 'post';
    	var qtyval = parseInt($('.product-quntty-'+ id).val());
    	qtyvalup   = qtyval + 1;
        $('.product-quntty-'+ id).val(qtyvalup);
        
        $.ajax({
			url: url,
	       	method: method,
	       	data:{
	          quantity:qtyvalup,
              row_id:rowId,
	       	},
	       	success: function (data) {
                
                $('.cart-count').html(data.count);
                $('.cart-totle').html(data.subtotal);

                $('.product-sub-totle-'+ id).html(data.product.qty * data.product.price);

	       	},//end of success

	   	});//this ajax
	
    });//end of product quntty

    $('.product-quntty-down').on('click', function(e) {
    	e.preventDefault();

        var id     = $(this).data('id');
        var rowId  = $(this).data('rowid');
        var url    = $(this).data('url');
        var method = 'post';
        var qtyval = parseInt($('.product-quntty-'+ id).val());
        qtyvalup   = qtyval - 1;

        if (qtyvalup == '0') {

            qtyvalup = 1;
            $('.product-quntty-'+ id).val(1);

        } else {

            var qtyval = parseInt($('.product-quntty-'+ id).val(qtyvalup));
        }

        $.ajax({
            url: url,
            method: method,
            data:{
              quantity:qtyvalup,
              row_id:rowId,
            },
            success: function (data) {
                
                $('.cart-count').html(data.count);
                $('.cart-totle').html(data.subtotal);

                $('.product-sub-totle-'+ id).html(data.product.qty * data.product.price);

            },//end of success

        });//this ajax
    	
    });//end of product quntty

    $('.removal-product').click( function(e) {
        e.preventDefault();

        var id      = $(this).data('id');
        var rowId   = $(this).data('rowid');
        var method  = 'delete';

        swal({
            title: "confirm delete",
            type: "error",
            icon: "warning",
            buttons: {cancel: "no",defeat:"yes"},
            dangerMode: true
        })

        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: 'destroy_cart/'+rowId,
                method: method,
                success: function(data) {

                    $('.delete-product-'+id).remove();

                    $('#cart-count').html(data.count.count);

                    if (data.app == 'ar') {
                        
                        currency = 'ح م';

                    } else {

                        currency = 'LE';
                    }

                    calculateTotal(currency);

                    swal({
                        title: "deleted successfully",
                        type: "success",
                        icon: 'success',
                        buttons: false,
                        timer: 15000
                    });//end of swal

                },//end of success

            });//this ajax 

            }; //end of if
        });//then

    });//end of product-removal button

    //calculate the total
    function calculateTotal(currency) {

        var price = 0;

        $('.new-price').each(function(index) {
            
            price += parseFloat($(this).html().replace(/,/g, ''));

        });//end of product price

        $('#cart-subtotal').html($.number(price, 2) + ' ' + currency);
        $('#cart-totle').html($.number(price, 2) + ' ' + currency);

    }//end of calculate total

});//end of document redy qtyval