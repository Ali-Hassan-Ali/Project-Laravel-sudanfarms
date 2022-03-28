$(document).ready(function() {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', '#select-category', function(e) {
        e.preventDefault();

        var $option   = $(this).find(":selected");
        var url       = $option.data('url');
        var method    = 'get';

        $.ajax({
            url: url,
            method: method,
            success: function (data) {
                
                $('#select-sub-category').empty('');

                $.each(data, function(index, category) {
                    
                    var html = `<option value="${category.id}">${category.name}</option>`;

                    $('#select-sub-category').append(html);

                });//end of each

            }//end of success

        });//endof ajax
        
    });//end od change product

    $(document).on('keyup change', '.product-price', function (e) {
        e.preventDefault();

        var price  = $(this).val();
        var url    = $('#amount-url').text();
        var method = 'post';
        
        if (price < 0) {
            price = 0;

            $(this).val('0');
        }

        $.ajax({
            url: url,
            method: method,
            data: {
                price: price
            },
            success: function (data) {
                
                $('.totle-price').html(data.price + ' ' + data.cry);
                $('.product-val-price').html(price + ' ' + '$');
                
            }//end of success
        });//end of ajax
        
    })//end of price

    $(document).on('keyup change', '.product-decount', function (e) {
        e.preventDefault();

        var price  = $(this).val();
        var url    = $('#amount-decount-url').text();
        var method = 'post';
        
        if (price < 0) {
            price = 0;
            
            $(this).val('0');
        }

        $.ajax({
            url: url,
            method: method,
            data: {
                price: price
            },
            success: function (data) {
                
                $('.totle-decount').html(data.price + ' ' + data.cry);
                $('.product-val-decount').html(price + ' ' + '$');
                
            }//end of success
        });//end of ajax
        
    })//end of price

    function previewImages() {

      $('#preview').empty('');

      var preview = document.querySelector('#preview');
      
      if (this.files) {
        [].forEach.call(this.files, readAndPreview);
      }

      function readAndPreview(file) {

        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
          return alert(file.name + " is not an image");
        } // else...
        
        var reader = new FileReader();
        
        reader.addEventListener("load", function() {
          var image = new Image();
          image.width  = 90;
          image.height = 90;
          image.title  = file.name;
          image.src    = this.result;
          preview.appendChild(image);
        });
        
        reader.readAsDataURL(file);
        
      }

    }

    document.querySelector('#file-input').addEventListener("change", previewImages);
    
});//end of redy