$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','.add-cart', function(e){
        e.preventDefault();

        var id      = $(this).data('id');
        var quantity= $('#add-cart-product-'+id).val();
        var url     = 'cart_store/';
        var method  = 'post';
        
        $.ajax({
            url: url,
            method: method,
            data:{
                quantity: quantity,
                id: id,
            },
            function(data) {

            	if (data.local == 'ar') {

            		var currency = 'ج س';
            		var title    = 'تمت الاضافه بنجاح';

            	} else {

            		var currency = 'SDG';
            		var title    = 'add success'

            	}

		        swal(title, {
		            type: "success",
		            icon: "success",
				  	buttons: false,
				  	timer: 3000,
		            timer: 15000
				});

                if (data.product.qty == 1) {

                	var html =
                        `<li class="cart-item">
			            	<div class="cart-media">
			            		<a href="#">
                                    <img src="${data.image_product.image_path}" alt="Product">
			            		</a>
                                <button class="cart-delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                            <div class="cart-info-group">
                            <div class="cart-info">
                                <h6><a href="${data.product.id}">${data.product_model.name}</a></h6>
                                <p class="product-qty-${data.product.id}"> ${data.product_model.name} - ${currency} ${data.product.price}</p>
                            </div>
                            <div class="cart-action-group">
                                    <div class="product-action">
                                        <button class="action-minus" title="نقصان الكيمة">
                                            <i class="icofont-minus"></i>
                                        </button>
                                        <input class="action-input product-qty-${data.product_model.id}" title="Quantity Number" type="text" name="quantity" value="${data.product.qty}">
                                        <button class="action-plus">
                                            <i class="icofont-plus"></i>
                                        </button>
                                    </div>
                                    <h6>${currency} ${data.product_model.price}</h6>
                                </div>
                            </div>
                        </li>`;

                    $('#add-cart-product').append(html);
                    // $('.all-product').html('1');

                } else {

                	var id         = data.product.id;
                    // var totalPrice = $.number(data.product.price * data.product.qty ,2);

                	// $('.product-qty-'+id).html(data.product.qty + ' ' + 'X' + ' ' + totalPrice + ' ' + currency);
                    $('.product-qty-'+id).val(data.product.qty);
                    // $('.all-product').html(data.count);

                }//end of if

                // calculateTotal(currency);

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


});//end of document redy qtyval