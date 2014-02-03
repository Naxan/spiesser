/*
|--------------------------------------------------------------------------
| panier.js
|--------------------------------------------------------------------------
|
| Gestion de la page panier
| 
| 

*/

$(document).ready(function() {
	$('#validation-commande-button').click(function() {
		var idPointRelais = $("#point-relais").val();
		if (idPointRelais == "null"){
			$.prompt("Aucun point relais n'a été séléctionné");
		}
		else {
			var impromptu = {
				state0: {
					title: 'Vos coordonnées pour valider votre commande',
					html:'<label style="float:left;width : 350px;"> Votre prénom : </label> <input type="text" id="prenom-client" value=""><br />'+
						 '<label style="float:left;width : 350px;"> Votre nom : </label> <input type="text" id="nom-client" value=""><br />'+
						 '<label style="float:left;width : 350px;"> Votre numéro de téléphone : </label> <input type="text" id="numero-client" value=""><br />'+
						 '<label style="float:left;width : 350px;"> Votre adresse e-mail : </label> <input type="text" id="mail-client" value=""><br />',
					buttons: { Suivant: 1 },
					focus: 1,
					submit:function(e,v,m,f){ 
						var mail = $('#mail-client').val();
						var telephone = $('#numero-client').val();
						var nom = $('#nom-client').val();
						var prenom = $('#prenom-client').val();
						var state = 'state0';

						if ( mail == ""){
							alert('L\'adresse mail doit être renseignée'); 
						}
						else if (!validateEmail(mail)){
							alert('L\'adresse mail ne semble pas être correcte'); 
						}
						else if (telephone == ""){
							alert('Le numéro de téléphone doit être renseigné'); 
						}
						else if (nom == ""){
							alert('Le nom doit être renseigné'); 
						}
						else {
							state = 'state1'
						}

						e.preventDefault();
						$.prompt.goToState(state);
					}
				},
				state1: {
					title: 'Validation de la commande',
					html:'Cliquez pour valider votre commande',
					buttons: { Valider:1, Annuler:-1 },
					focus: 1,
					submit:function(e,v,m,f){ 
						if(v==1){
							showChargement();
							$.ajax({
							  type: "POST",
							  url: "../panier/validation-commande",
							  success: function (data){
							  		hideChargement();
									$('#global-panier').html('<div id="commande-validee"> <b> Merci ! </b> Un récapitulatif de votre commande vous a été envoyé par mail </div>');
									//$('#nb-articles-total').html('Mon panier ('+$('#boutique-nbArticles').html()+')');
									//$.prompt("Le nombre d'article a été mis à jour");
							  },
							  data: "idPointRelais="+idPointRelais+"&numero-client="+$('#numero-client').val()+"&mail-client="+$('#mail-client').val()
							  	+"&prenom-client="+$('#prenom-client').val()+"&nom-client="+$('#nom-client').val(),
							  dataType: "text"
							});
						}
					}
				},
			}
			$.prompt(impromptu);
		}
	});
});


function modifierNombreArticle(idArticle, nbDepart, nbArticleTotal){
	var impromptu = {
		state0: {
			title: 'Entrez le nombre de produit désiré ?',
			html:'<input id="nombreArticleModif" value="'+nbDepart+'" type="numeric" size="3" name="nombreArticle" value=""> article(s)',
			buttons: { Valider: 1 },
			focus: 1,
			submit:function(e,v,m,f){ 
				var nbArticles = $('#nombreArticleModif').val();
				if (isNaN(nbArticles)) {
					alert("Ceci n'est pas un nombre");
				}
				else if (nbArticles < 0){
					alert("Le nombre ne peut pas être négatif");
				}
				else if (nbArticles > 500) {
					alert("Le nombre d\'articles est trop élevé");
				}
				else {
					showChargement();
					$.ajax({
					  type: "POST",
					  url: "../panier/modifier-nombre-article",
					  success: function (data){
					  		hideChargement();
							$('#global-panier').html(data);
							$('#nb-articles-total').html('Mon panier ('+$('#boutique-nbArticles').html()+')');
							$.prompt("Le nombre d'article a été mis à jour");
					  },
					  data: "idArticle="+idArticle+"&nbArticles="+nbArticles,
					  dataType: "text"
					});
				}
			}
		},
	};
	$.prompt(impromptu);
}


function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 


function showChargement() {
	$('.chargement').fadeTo(800,0.6);
}

function hideChargement() {
	$('.chargement').hide();
}

function initPanier() {
	if (confirm("Attention, tous les articles de votre panier seront supprimés. Confimer la suppression ?")) {
	    $.ajax({
	        url: "../boutique/initialiser-article",
	        type: "POST",
	        data: null,
	        dataType: "text",
	        success: function(html) {
	            $.prompt("Votre panier est désormais vide");
	            window.location.reload(true);
	        }
	    });
	}
}
