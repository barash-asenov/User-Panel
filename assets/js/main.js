$.noConflict();

(function ($) {
	'use strict';

	const script_parameter = $('script[src*=main]');

	const base_url = script_parameter.attr('data-base_url');

	$('#form-signup').submit(function (e) {
		e.preventDefault();

		const formData = {
			username: $('#inputUsername').val(),
			email: $('#inputEmail').val(),
			captchaResponse: grecaptcha.getResponse()
		};

		$.ajax({
			type: 'POST',
			url: `${base_url}/Users`,
			data: formData,
			beforeSend: function () {
				$('#submitButton')
					.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>')
					.removeClass('btn-primary')
					.addClass('btn-secondary');
			},
			success: function (response) {
				const message = response.message;
				$('#form-signup').html('').trigger('reset');
				$('#signupTitle').html('');
				$('#alertBox').html(message).removeClass('alert-danger').addClass('alert alert-success');
			},
			error: function (response) {
				try {
					const responseText = JSON.parse(response.responseText);

					if (responseText && typeof responseText === "object") {
						const errors = Object.values(responseText);
						$('#alertBox').html(errors[0]).addClass('alert alert-danger');
					} else {
						$('#alertBox').html('Something Went Wrong.').removeClass('alert-success').addClass('alert alert-danger');
					}
				} catch (e) {
					$('#alertBox').html('Something Went Wrong.').removeClass('alert-success').addClass('alert alert-danger');
				}
			},
			complete: function () {
				grecaptcha.reset();
				$('#submitButton')
					.html('Register')
					.removeClass('btn-secondary')
					.addClass('btn-primary');
			}
		})
	});
})(jQuery);
