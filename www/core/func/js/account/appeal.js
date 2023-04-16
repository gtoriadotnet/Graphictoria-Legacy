// xlxi wuz here
// gt's codebase is trash, so it takes a while to add features like this

$(document).ready(
	function()
	{
		$('#appealExplanation').on(
			'input propertychange paste',
			function()
			{
				let textValue = $('#appealExplanation').val()
				if(textValue.length <= 50)
				{
					if ($('#sendAppeal').is(':disabled') == false)
					{
						$('#sendAppeal').prop('disabled', true);
						$('#explanationError').html('Your explanation must be over 50 characters. Please note that spamming characters will result in your appeal being denied.');
					}
				}
				else
				{
					if ($('#sendAppeal').is(':disabled') == true)
					{
						$('#sendAppeal').prop('disabled', false);
						$('#explanationError').html('');
					}
				}
			}
		);
		
		$('#sendAppeal').click(
			function()
			{
				if ($('#sendAppeal').is(':disabled') == false)
				{
					$('#sendAppeal').prop('disabled', true);
					$('#appealExplanation').prop('disabled', true);
					let csrf = $('meta[name="csrf-token"]').attr('content');
					$.post(
						'/core/func/api/account/sendAppeal.php',
						{
							csrf: csrf,
							explanation: $('#appealExplanation').val()
						}
					)
					.done(
						function(response)
						{
							$('#sendAppeal').prop('disabled', false);
							$('#appealExplanation').prop('disabled', false);
							if (response == 'error')
							{
								$('#appealStatus').html('<div class="alert alert-danger">Network error. Try again later.</div>');
							}
							else if (response == 'bad-length')
							{
								$('#appealStatus').html('<div class="alert alert-danger">Please make sure your explanation is over 50 characters.</div>');
							}
							else if (response == 'appeal-error')
							{
								$('#appealStatus').html('<div class="alert alert-danger">Something went wrong while sending your appeal, please try again. If this error persists, contact <a href="mailto:support@gtoria.net"><b>support</b></a>.</div>');
							}
							else if (response == 'unfinished')
							{
								$('#appealStatus').html('<div class="alert alert-danger">The appeal system isn\'t finished yet! Your appeal has not been sent.</div>');
							}
							else
							{
								window.location.reload();
							}
						}
					)
					.fail(
						function()
						{
							$('#appealStatus').html('<div class="alert alert-danger">Network error. Try again later.</div>');
						}
					);
				}
			}
		);
	}
);