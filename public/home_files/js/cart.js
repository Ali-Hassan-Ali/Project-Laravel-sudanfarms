$(document).ready(function() {

    $(document).on('click','.add-cart', function(e){
        e.preventDefault();
        
        var url     = $(this).data('url');
        var method  = $(this).data('method');
        var id      = $(this).data('id');
        
        
        $.ajax({
            url: url,
            method: method,
            success: function(data) {

            	if (data.local == 'ar') {

            		var currency = 'ج م';
            		var title    = 'تمت الاضافه بنجاح';

            	} else {

            		var currency = 'LE';
            		var title    = 'add success'

            	}

		        swal(title, {
		            type: "success",
		            icon: "success",
				  	buttons: false,
				  	timer: 3000,
		            timer: 15000
				});

                $('#size-product-id').val('');
                $('#size-product').val('');

                $('#color-product-id').val('');
                $('#color-product').val('');

                $('#size-product-item').empty('');

            	$('#cart-totle').html(data.total + ' ' + currency);
            	$('#cart-count').html(data.count);

                $('.add-cart-color').each(function(index) {
            
                    $(this).parent().removeClass('active');

                });//end of each

                if (data.product.qty == 1) {

                	var html =
			            `<li>
			            	<div class="shopping-cart-img">
			            		<a href="#">
                                    <img src="${data.product_model.defult_image}" alt="Product">
			            		</a>
                            </div>
                            <div class="shopping-cart-title">
                                <h4><a href="${data.product.id}">${data.product_model.title}</a></h4>
                                <h4><span class="product-qty-${data.product.id}"> 1 X ${data.product.price}  ${currency}</span></h4>
                            </div>
                            <div class="shopping-cart-delete">
                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                            </div>
                        </li>`;

                    $('#add-cart-product').append(html);

                } else {

                	var id         = data.product.id;
                    var totalPrice = $.number(data.product.price * data.product.qty ,2);

                	$('.product-qty-'+id).html(data.product.qty + ' ' + 'X' + ' ' + totalPrice + ' ' + currency);

                }//end of if

            }, error: function(data) {
                console.log(data);
            },

        });//end of ajax

    });//end of click

    $('.product-quntty-up').on('click', function(e) {
    	e.preventDefault();

    	var id     = $(this).data('id');
    	var qtyval = parseInt($('#product-quntty-'+ id).text());
    	var method = 'post';
        var rowId  = $(this).data('rowid');

    	qtyvalup   = qtyval + 1;
        $('#product-quntty-'+ id).text(qtyvalup);

        $.ajax({
			url: 'cart_update/'+id,
	       	method: method,
	       	data:{
	          quantity:qtyvalup,
              row_id:rowId,
	          id:id,
	       	},
	       	success: function (data) {

                calculateTotal();

                if (data.app == 'ar') {
                    
                    currency = 'ح م';

                } else {

                    currency = 'LE';
                }

                calculateTotal(currency);

                subTotleProduct = $.number(data.cart.qty * data.cart.price - data.coupon,2);

                $('#cart-count').html(data.count.count);

                $('.product-qty-'+id).text(data.cart.qty + ' ' + 'X' + ' ' + subTotleProduct + ' ' + currency);

                $('#subtotal-' + id).text(subTotleProduct);

	       	},//end of success

	   	});//this ajax
	
    });//end of product quntty

    $('.product-quntty-down').on('click', function(e) {
    	e.preventDefault();

    	var id     = $(this).data('id');
    	var qtyval = parseInt($('#product-quntty-' + id).text());
    	var method = 'post';
        var rowId  = $(this).data('rowid');
    	qtyvaldown = qtyval - 1;

        if (qtyval > 1) {

            $('#product-quntty-'+ id).text(qtyvaldown);

            $.ajax({
    			url: 'cart_update/'+id,
    	       	method: method,
    	       	data:{
    	          quantity:qtyvaldown,
                  row_id:rowId,
    	          id:id,
    	       	},
    	       	success: function (data) {


                    if (data.app == 'ar') {
                        
                        currency = 'ح م';

                    } else {

                        currency = 'LE';
                    }

                    calculateTotal(currency);

                    subTotleProduct = $.number(data.cart.qty * data.cart.price - data.coupon,2);

                    $('#cart-count').html(data.count.count);

                    $('.product-qty-'+id).text(data.cart.qty + ' ' + 'X' + ' ' + subTotleProduct + ' ' + currency);
                    
                    $('#subtotal-' + id).text(subTotleProduct);

    	       	},//end of success

    	   	});//this ajax

        } else {

            qtyval = 1; 

            $('#product-quntty').text(qtyval)

        }//end of ig
    	
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

    $('.coupon-product').click( function(e) {
        e.preventDefault();

        var coupon  = $('#product-coupon').val();
        var method  = 'post';

        $.ajax({
            url: 'coupon_cart',
            method: method,
            data: { coupon:coupon },
            success: function(data) {

                if (data.success == true) {

                    swal('success coupon', {
                        type: "success",
                        icon: "success",
                        buttons: false,
                        timer: 3000,
                    });

                    location.reload();

                } else {

                    swal('error coupon', {
                        type: "error",
                        icon: "error",
                        buttons: false,
                        timer: 3000,
                    });

                }//endof if

            },//end of success

        });//this ajax 

    });//end of coupon product button

    $('.delete-coupon').click( function(e) {
        e.preventDefault();

        var method  = 'get';
        var url     = 'destroy_cart';

        swal({
            title: "confirm delete",
            type: "warning",
            icon: "warning",
            buttons: {cancel: "no",defeat:"yes"},
            dangerMode: true
        })

        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                method: method,
                success: function(data) {

                    if (data.success == true) {

                        location.reload();

                        swal('deleted successfully', {
                            type: "success",
                            icon: "success",
                            buttons: false,
                            timer: 3000,
                        });
                        
                    }//end of if

                },//end of success

            });//this ajax 

            }; //end of if
        });//then

    });//end of product-removal button

});//end of document redy qtyval