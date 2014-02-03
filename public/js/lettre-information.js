/*
|--------------------------------------------------------------------------
| lettre-information javascript file
|--------------------------------------------------------------------------
|
|	Gestion de l'abonnement à la newsletter
|
*/

$('form#inscription-newsletter').submit( function(e) {
	e.preventDefault(); // on empeche l'envoi du formulaire par le navigateur
	var datas = $(this).serialize();
	$.ajax({
		type: 'POST',      // envoi des données en POST
		url: $(this).attr('action'),     // envoi au fichier défini dans l'attribut action
		data: datas,     // sélection des champs à envoyer
		success: function(msg) {     // callback en cas de succès
			var response = jQuery.parseJSON(msg);
			if(response.erreur){
				$().toastmessage('showErrorToast', response.content);
			}
			else {
				$().toastmessage('showSuccessToast', response.content);
				hideInscriptionNewsletter();
			}
		}
	});
});


function showInscriptionNewsletter() {
	$('#header-inscription-newsletter').hide('400', function(){
		$('#header-inscription-newsletter-clicked').show('400', function() {
			$("input[name='mail']").focus();
		});
	});
}

function hideInscriptionNewsletter(){
	$("input[name='mail']").val('');
	$('#header-inscription-newsletter-clicked').hide('400', function(){
		$('#header-inscription-newsletter').show('400', function() {
		});
	});	
}