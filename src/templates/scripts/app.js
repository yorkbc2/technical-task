$(document).ready(function (globalEvent) {

	var ge = globalEvent;

	function find (element, name) {
		var elements = [],
			fined = element.querySelectorAll('*[name='+name+']'),
			value = "";

		if(fined.length > 1) {
			for(var i = 0 ; i < fined.length ; i++) {
				if(fined[i].checked == true) {
					value = fined[i].value;
					break;
				}
				else {
					continue;
				}
			}
		}
		else {
			value = fined[0].value;
		}

		return value;
	}

	var selectors = {
		rating: "#rating-input",
		office: "#office-input",
		comment: {
			positive: "#positive-input",
			negative: "#negative-input"
		}
	},
		form = $("#testimonial-form");

	form.on('submit', function (formEvent) {

		var fe = formEvent,
			target = formEvent.target;

		fe.preventDefault()

		var data = {
			office: find(target, 'office'),
			rating: find(target, 'rating'),
			commentPositive: find(target, 'comment_positive'),
			commentNegative: find(target, 'comment_negative') 
		};

		function hideForm () {
			$("#testimonial-form").slideUp();
		}
		function successAlert() {
			$('#testimonial-response').html(`<div class="ui success message">
				  <div class="header">
				    Успешно!
				  </div>
				  <p>Спасибо за отправку отзыва о нас!</p>
			</div>`)
		}

		function errorAlert(id) {
			$(id).html(`<div class="ui negative message">
			
			  <div class="header">
			    Ошибка в отправки данных!
			  </div>
			  <p>Попробуйте позже, перезагрузите страницу или обратитесь к администратору!
			</p></div>`)
		}

		if(grecaptcha.getResponse()) {

		}
		else {
			errorAlert('#testimonial-error--form')
		}

		// $.ajax({
		// 	url: "server.php",
		// 	data: data,
		// 	cache: false,
		// 	method: "POST",
		// 	success(response) {
		// 		hideForm()
		// 		if(parseInt(response) == 1) {
		// 			successAlert()
		// 		}
		// 		else {
		// 			errorAlert()
		// 		}
		// 	},
		// 	error(err) {
		// 		hideForm()
		// 		errorAlert()
		// 	}
		// })

	});

});