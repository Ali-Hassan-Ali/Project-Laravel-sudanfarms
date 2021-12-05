$(document).ready(function() {

	$(document).on('click', '.count-call-phone', function (e) {
		e.preventDefault();

		var id     = $(this).data('id');
		var url    = $(this).data('url');
		var method = 'get';

		$.ajax({
			url: url,
			method: method,
		});//end of ajax

	});//end of click phone

	$(document).on('click', '.count-call-email', function (e) {
		e.preventDefault();

		var id     = $(this).data('id');
		var url    = $(this).data('url');
		var method = 'get';

		$.ajax({
			url: url,
			method: method,
		});//end of ajax

	});//end of click email

});//end of document redy function