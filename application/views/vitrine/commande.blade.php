@layout('layouts.global')

<!--  BOUTIQUE / COMMANDE EN LIGNE -->

@section('sous-menu')
	<br/> <br/>
@endsection

@section('content')
	

	<h1> Commande en ligne </h1>
	<br/>
	<?php /*

	<div id="balance" class="centered"> <img id="img-balance" src="../img/commande/panier.gif"/>  0 produit(s) dans le panier </div> 

	<?php $lst_categorie = new LstCategorie(); $i=0;?>

		<form id="formulaire-commande" name="formulaire-commande" action="../ajout-produit" method="post">

			<div id="dropdown-elements">
				<div id="dropdown-categorie"> 
					<select style="width : 400px;" name="dropdown" id="commande-dropdown" class="dropdown" tabindex="1" data-placeholder="Sélectionnez une catégorie">
						<option class="commande-option"> </option>
						@foreach ($lst_categorie->lst_categorie as $produits)
							<option class="commande-option" value="{{$produits->id}}"> {{$produits->categorie}} </option>
						@endforeach
					</select>
				</div>

				@foreach ($lst_categorie->lst_categorie as $produits)
					<div id="dropdown-produits-{{$produits->id}}" class="dropdown-produits">
						<select style="width : 400px;" name="dropdown" id="subcommande-dropdown-{{$produits->id}}" class="dropdown subdropdown" tabindex="2" data-placeholder="Sélectionnez un produit">
							<option class="commande-option"> </option>
								@foreach ($produits->lst_produits as $produit)
									<option class="commande-option" value='{{ htmlspecialchars(json_encode($produit), ENT_QUOTES, 'UTF-8')}}'> {{$produit->nom}} </option>
								@endforeach

						</select>
					</div>
				@endforeach
			</div>

			<input type="submit" id="ajouter-article" value="Ajouter cet article"/>

		</form>
	*/
	?>
	<div id="commande">
		<h2> Ici, vous pourrez bientôt accéder à un espace de commande en ligne. N'hésitez pas à vous inscrire à notre lettre d'information pour être averti lorsque le service sera disponible </h2>
	</div>


	<div class="clear"> </div>

	<h1> Point relais </h1> 
	<br/>

	<h2> Consulter ici les points relais pour récupérer vos commandes </h2>

	<div class="clear"> </div>
	<br/>

	<div class="photos"> 

		<div class="photo maps"> 
			<div class="lbl-photos"> 
				Point relais 1 <br/>
				Boucherie Holtzheim
			</div>
			<iframe width="500" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.fr/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=9+Rue+du+Lieutenant+Lespagnol,+Holtzheim&amp;aq=0&amp;oq=9+rue+du+lieutenant+le&amp;sll=48.599123,7.587081&amp;sspn=1.596606,4.22699&amp;ie=UTF8&amp;hq=&amp;hnear=9+Rue+du+Lieutenant+Lespagnol,+67810+Holtzheim,+Bas-Rhin,+Alsace&amp;t=m&amp;ll=48.557807,7.642965&amp;spn=0.019883,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.fr/maps?f=q&amp;source=embed&amp;hl=fr&amp;geocode=&amp;q=9+Rue+du+Lieutenant+Lespagnol,+Holtzheim&amp;aq=0&amp;oq=9+rue+du+lieutenant+le&amp;sll=48.599123,7.587081&amp;sspn=1.596606,4.22699&amp;ie=UTF8&amp;hq=&amp;hnear=9+Rue+du+Lieutenant+Lespagnol,+67810+Holtzheim,+Bas-Rhin,+Alsace&amp;t=m&amp;ll=48.557807,7.642965&amp;spn=0.019883,0.036478&amp;z=14&amp;iwloc=A">Agrandir le plan</a></small>
		</div>
	</div>




	<div class="clear"> </div>
	<script type="text/javascript">  
		$(".dropdown").chosen();
	</script>
	{{ HTML::script("js/commande.js") }}
@endsection