/*
|--------------------------------------------------------------------------
| mail-contact javascript file
|--------------------------------------------------------------------------
|
|	Gestion de l'envoi d'un mail par le formulaire de christine
|
*/

$('form#form-mail-contact').submit( function(e) {
	e.preventDefault(); // on empeche l'envoi du formulaire par le navigateur
	var datas = $(this).serialize();
	var mail = $('#input-mail').val();
	var message = $('#input-message').val();
	if (!mailOK(mail)){
		$().toastmessage('showErrorToast', 'L\'adresse mail n\'est pas valide');
	}
	else if ($.trim(message) == ''){
		$().toastmessage('showErrorToast', 'Le contenu du message est vide');
	}
	else {
		$.ajax({
			type: 'POST',      // envoi des données en POST
			url: $(this).attr('action'),     // envoi au fichier défini dans l'attribut action
			data: datas,     // sélection des champs à envoyer
			success: function(msg) {     // callback en cas de succès
				$('#form-mail-contact').hide();
				$('#message-envoye').show();
			}
		});
	}
	return false;
});


function mailOK(mailteste) {
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

	if(reg.test(mailteste))
	{
		return(true);
	}
	else
	{
		return(false);
	}
}
