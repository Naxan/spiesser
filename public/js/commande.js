/*
|--------------------------------------------------------------------------
| commande.js
|--------------------------------------------------------------------------
|
| Gestion de la prise de commande
| 
| 

*/

var grammes = new Array("morceau(x)","tranches fines","BMW");
var pieces  = new Array("pièce(s)");


$(document).ready(function() {



	$('.list-catalogue-elem').hover(function () {
		$('#open-catalogue-'+this.id).fadeTo(800,1);
		}, 	
		function(){
			$('#open-catalogue-'+this.id).hide();
		}
	);
});


// Ouverture d'un catalogue en récupérant le titre
function openCatalogue(idCategorie){
	$('#boutique-catalogue-actif').html('<div id="chargement-en-cours"> <img src="img/boutique/loading2.gif"/> Chargement du catalogue en cours </div>');
	$('#boutique-catalogue-actif').fadeTo(1500,1);
	$('html,body').animate({ scrollTop: $('#chargement-en-cours').offset().top}, 1000);
	$.ajax({
	  type: "POST",
	  url: "../boutique/catalogue",
	  success: success,
	  data: "idCategorie="+idCategorie,
	  dataType: "text"
	});

	function success(data){
		$('#boutique-catalogue-actif').fadeTo(800,0.1, function(){
			$('#boutique-catalogue-actif').html(data);
            $( ".nb-articles.gramme" ).spinner({
                min: 0,
                max: 90000,
                step: 0.1,
                start: 0,
                numberFormat: "n"
            });

            $( ".nb-articles.unite" ).spinner({
                min: 0,
                max: 900,
                step: 1,
                start: 0,
                numberFormat: "n"
            });



            $('.indication-article').change(function () {
                // Gestion du type de commande (grammes/pièces...) en fonction du type de la vente
                //alert($(this).val());
            });

			//single book
			imagePreview();
		    $('#catalogue-charcuterie').booklet({
		    	width:  1050,
		    	height: 850
			});
			
			$('#boutique-catalogue-actif').fadeTo(800,1);

			// Ajout d'un article
			$('.article-a-ajouter').click(function(event) {
		        // je récupère les valeurs
		        var numArticle = $(this).val();
		        var nbArticle = $('#nb-articles-'+numArticle).val();
		        var actionArticle = $('#action-article-'+numArticle).val();
                var indicationArticle = $('#indication-article-'+numArticle).val();
		        if(nbArticle == ""){
		        	$.prompt('Ceci n\'est pas un nombre');
		        }
		        else if (nbArticle < 0.1){
		        	$.prompt('Entrez un nombre positif');
		        	$('#nb-articles-'+numArticle).val(1);
		        }
		        else if (nbArticle > 100000) {
		        	$.prompt('Le nombre d\'articles est trop élevé');
		        }
		        else {
		        	showChargement();
		            // appel Ajax
		            $.ajax({
		                url: "../boutique/ajouter-article",
		                type: "POST",
		                data: "nbArticle="+nbArticle+"&numArticle="+numArticle+"&actionArticle="+actionArticle+"&indicationArticle="+indicationArticle,
		                dataType: "json",
		                success: function(json) {
		                	hideChargement();
		                    $.prompt(json.message);
		                    $('#nb-articles-total').html('Mon panier ('+json.quantiteTotalArticle+')');
		                }
		            });
		        }
		        return false;
		    });
		});
	}
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
	            $('#nb-articles-total').html('Mon panier (0)');
	        }
	    });
	}
}

function closeCatalogue() {
	$('#boutique-catalogue-actif').hide();
}

function showChargement() {
	$('.chargement').fadeTo(800,0.6);
}

function hideChargement() {
	$('.chargement').hide();
}





/* V1 
$('form#formulaire-commande').submit( function(e) {
	e.preventDefault(); // on empeche l'envoi du formulaire par le navigateur
	var produit = jQuery.parseJSON(activeProduitJSON);
	$.ajax({
		type: 'POST',      // envoi des données en POST
		url: $(this).attr('action'),     // envoi au fichier défini dans l'attribut action
		data: 'produit='+activeProduitJSON,     // JSON a envoyer
		success: function(msg) {     // callback en cas de succès
			alert(msg);
		}
	});
});


function hideAll() {
	$('.dropdown-produits').hide();
	$('#ajouter-article').hide();
}

*/

//Gestion du hover sur un article pour voir la photo en plus grand
this.imagePreview = function(){	
	/* CONFIG */
		xOffset = 10;
		yOffset = 30;
		
	/* END CONFIG */
	$("a.preview").hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		$("body").append("<p id='preview'><img src='"+ this.href +"' alt='Image preview' />"+ c +"</p>");								 
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.css("width",("400px"))
			.css("z-index",99999)
			.css("position", "absolute")
			.fadeIn("slow");						
    },
	function(){
		this.title = this.t;	
		$("#preview").remove();
    });	
	$("a.preview").mousemove(function(e){
		if (e.pageX > window.innerWidth/2) {
			yOffset = -430;
		}
		else {
			yOffset = 30;
		}
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};
