@layout('layouts.global')

<!--  TRAITEUR -->

@section('sous-menu')
	<br/> <br/>
@endsection

@section('content')


	<h1> Les catalogues </h1>
	<br/>

	<div class="photos">
		<div class="photo">
			<div class="lbl-photos">
				Voir notre <br/>
				catalogue en ligne
			</div>
			<a href="../boutique">
				<img class="img-photos" alt="Bleu Blanc Coeur" src="../fichiers/telechargement/vitrine.png"/>
			</a>
		</div>

		<div class="photo">
			<div class="lbl-photos">
				Menu <br/>
				Complet 2013
			</div>
			<a href="../fichiers/telechargement/MENU 2013MAI COMPLET.pdf">
				<img class="img-photos" alt="Menu Année 2013" src="../fichiers/telechargement/menu_2013.png"/>
			</a>
		</div>
	</div>

	<h1> Point traiteur </h1>
	<br/>

	<div class="photo left-floating"> 
		<div class="lbl-photos"> 
			Traiteur <br/>
		</div>
		<img src="img/traiteur/traiteur1.jpg" alt="Traiteur" class="img-photos"/>
	</div>

	<div class="photo left-floating"> 
		<div class="lbl-photos"> 
			Traiteur <br/>
			Crudités
		</div>
		<img src="img/traiteur/crudites.jpg" alt="Crudités" class="img-photos"/>
	</div>
	
	<div id="texte">
		<h2> Le traiteur pour tous vos évenements </h2>
		<p> Nous préparons des menus pour vos fêtes de famille. </p>

	</div>

	<div class="clear"> </div>
	


@endsection
