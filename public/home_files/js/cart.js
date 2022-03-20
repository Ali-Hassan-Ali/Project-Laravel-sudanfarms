$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });//end if ajax sutup

    if ($('#getLocale').text() == 'ar') {

        var addSuccess    = 'تمت الإضافة بنجاح';
        var confirmDelete = 'الاستمرار في الحذف';
        var deletedSucces = 'تم الخذف بنجاح';
        var yes           = 'نعم';
        var no            = 'لا';

    } else {

        var addSuccess    = 'added successfully';
        var confirmDelete = 'confirm delete';
        var deletedSucces = 'deleted Successfully';
        var yes           = 'yes';
        var no            = 'no';

    }

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

                swal(addSuccess, {
                    type: "success",
                    icon: "success",
                    buttons: false,
                    timer: 3000,
                    timer: 15000
                });

                if (data.product.qty == 1) {

                    var subTotle     = $.number(data.product.price * data.product.qty ,2);
                    var productPrice = $.number(data.product.price,2);

                    var item =  `<li class="cart-item cart-item-${data.product.id}">
                                    <div class="cart-media">
                                        <a href="#">
                                            <img src="${data.image_product.image_path}" alt="Product">
                                        </a>
                                        <button class="cart-delete-${data.product.id} removal-product"
                                                data-id="${data.product.id}" data-rowId="${data.product.rowId}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                    <div class="cart-info-group">
                                    <div class="cart-info">
                                        <h6><a href="4">name ar</a></h6>
                                        <p class="product-qty-4"> ${data.product_model.quantity_guard} - ${productPrice} ${data.currency}</p>
                                    </div>
                                    <div class="cart-action-group">
                                        <div class="product-action">
                                            <button class="product-quntty-down"
                                                data-id="${data.product.id}" data-rowId="${data.product.rowId}">
                                                <i class="icofont-minus"></i>
                                            </button>
                                            <input class="action-input product-quntty-${data.product.id}" title="Quantity Number" type="text" name="quantity" value="${data.product.qty}" 
                                                spellcheck="false" data-ms-editor="true">
                                            <button class="product-quntty-up"
                                                data-id="${data.product.id}" data-rowId="${data.product.rowId}">
                                                <i class="icofont-plus"></i>
                                            </button>
                                        </div>
                                        <h6 class="product-sub-totle-${data.product.id}">${data.currency} ${subTotle}</h6>
                                    </div>
                                </li>`;

                    $('#add-cart-product').append(item);

                } else {

                    var subTotle = $.number(data.product.price * data.product.qty ,2);
                    $('.product-sub-totle-'+ id).html(data.currency + ' ' + subTotle);
                    $('.product-quntty-'+ id).val(data.product.qty);

                }//end of if

                $('.no-data').remove();
                $('.cart-count').html(data.count);
                $('.cart-totle').html(data.subtotal);


            }, error: function(data) {
                console.log(data);
            },

        });//end of ajax

    });//end of click

    $(document).on('click','.product-quntty-up', function(e) {
    	e.preventDefault();
        
    	var id     = $(this).data('id');
        var rowId  = $(this).data('rowid');
        var url    = $('#cart-update').text();
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
                var subTotle = $.number(data.product.price * data.product.qty ,2);
                $('.product-sub-totle-'+ id).html(data.currency + ' ' + subTotle);

	       	},//end of success

	   	});//this ajax
	
    });//end of product quntty

    $(document).on('click','.product-quntty-down', function(e) {
    	e.preventDefault();

        var id     = $(this).data('id');
        var rowId  = $(this).data('rowid');
        var url    = $('#cart-update').text();
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
                var subTotle = $.number(data.product.price * data.product.qty ,2);
                $('.product-sub-totle-'+ id).html(data.currency + ' ' + subTotle);

            },//end of success

        });//this ajax
    	
    });//end of product quntty


    $(document).on('click','.removal-product', function(e) {
        e.preventDefault();

        var id      = $(this).data('id');
        var rowId   = $(this).data('rowid');
        var url     = $('#cart-destroy').text();
        var method  = 'post';

        swal({
            title: confirmDelete,
            type: "error",
            icon: "warning",
            buttons: {cancel: no,defeat:yes},
            dangerMode: true
        })

        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: url,
                method: method,
                data: {row_id:rowId},
                success: function(data) {

                    $('.cart-item-'+id).remove();
                    $('.cart-count').html(data.count);
                    $('.cart-totle').html(data.subtotal);

                    swal({
                        title: deletedSucces,
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

    $(document).on('click','.btn-send',function () {

        $(this).addClass('d-none');

    });//end of btn-send

});//end of document redy qtyval