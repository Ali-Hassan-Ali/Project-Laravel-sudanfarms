$(document).ready(function() {
	
	$(document).on('change', '#select-country', function(event) {
		event.preventDefault();

		var id 	   = $(this).find(':selected').val();
		var url    = '/cty_form_country/' + id;
		var method = 'get';

		$.ajax({
			url: url,
			method: method,
			success: function (data) {

                $('#select-city').empty('');

				$.each(data.citys, function(index, city) {

                    var html = `<option value="${city.id}">${city.name}</option>`;

                    $('#select-city').append(html);

                });//end of each

			}//end of success
		});//end of ajax
		
	});//end of change country

});//end of resy