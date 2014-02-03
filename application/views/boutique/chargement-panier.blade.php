<div id="boutique-panier"> 
	<span id="boutique-nbArticles"> {{Session::get('total_articles', function() {return 'Aucun ';});}} </span> 
	   article(s) dans le panier <img src="../img/boutique/panier.gif">
    <div id="supprimer-panier"> <a href="#" onclick="initPanier()"> Supprimer tous les éléments du panier </a> </div>
</div>
<br/>
@if (!is_null($articles))
	<div id="articles-panier">
		@foreach ($articles as $article)
			@if ($session_articles[$article->id] > 0)
				<div id="article-panier-{{$article->id}}" class="article-panier"> 
					<?php 
						$src_img = '../img/boutique/cat-'.$article->id_categorie.'/article-'.$article->code_article.'.jpg';
						$default_img = '../img/boutique/photo-en-cours.jpg';
                        $indication_vente_liste = explode("|", $article->indication_vente_liste);
                        $categorieCourante = null;
                        foreach ($categories as $categorie) {
                            if ($categorie->id == $article->id_categorie) {
                                $categorieCourante = $categorie;
                                break;
                            }
                        }
					?>
					<img class="panier-img" src="{{$src_img}}" alt="{{$article->article}}" onError="this.src='{{$default_img}}'"/>
                    <div id="panier-categorie"> <span class="ligne-panier"> Categorie : </span> {{$categorieCourante->categorie}} </div>
					<div id="panier-article"> <span class="ligne-panier"> Article : </span> {{$article->article}} </div>
					<div id="panier-quantite"> <span class="ligne-panier"> Quantite : </span> {{$session_articles[$article->id]}} {{$indication_vente_liste[0]}} </div>
					<div id="panier-description"> <span class="ligne-panier"> Description : </span> {{$article->description}} </div>
                    <div id="panierindication-prix">
                        <span class="ligne-panier"> Indication Prix : </span> {{$article->indication_prix}}&#8364; {{$article->indication_prix_reference}}
                    </div>
					<div id="panier-indication"> {{$article->indication_vente}} </div>
					<div id="commande-article"> 
						<input onclick="modifierNombreArticle({{$article->id}}, {{$session_articles[$article->id]}})" class="button" type="button" value=" Modifier la quantité "/> 
					</div>
				</div>
				<div class="clear"> </div>
			@endif
		@endforeach
	</div>

	<div class="clear"> </div>
	<br/>
	<h1> Points relais </h1>
	@foreach ($points_relais as $point_relais) 
		<p> 
			Point relais : {{$point_relais->titre}} <br/>
			<a href="{{$point_relais->gmaps_link}}" target="_blank"> (Voir sur google maps) </a> 
		</p>
	@endforeach
	<b> Sélectionner le point relais pour récupérer votre commande : </b>
	<select id="point-relais"> 
		<option value="null"> Cliquez pour choisir le point relais </option> 
		@foreach ($points_relais as $point_relais) 
			<option value="{{$point_relais->id}}"> {{$point_relais->titre}} </option>
		@endforeach
	</select>
	<div id="valider-ma-commande"> 
		<input id="validation-commande-button" type="button" value="Valider ma commande"/>
	</div>
@endif
{{ HTML::script('js/menus.js')}}
{{ HTML::script('js/panier.js')}}
