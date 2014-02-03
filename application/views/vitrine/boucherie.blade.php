@layout('layouts.global')

<!--  BOUCHERIE -->

@section('sous-menu')
	<br/> <br/>
@endsection

@section('content')


	<h1> La Boucherie </h1>
	<br/>

	<div class="photo left-floating"> 
		<div class="lbl-photos"> 
			Boeuf <br/>
		</div>
		<img src="img/boucherie/boucherie_boeuf_agneau.jpg" alt="Boeuf et Agneau" class="img-photos"/>
	</div>
	
	<div id="texte">
		
		<h2> Actuellement dans notre rayon boucherie vous trouverez en exclusivité </h2>
		
		<p> Côtes de boeuf - Entrecôtes - Onglets <b> ANGUS </b> <br/>
		Ma sélection de viandes est issue d'élevages raisonnés Français, la filière traditionnelle est un facteur qui permet un équilibre naturel de matières grasses dans notre alimentation. </p>

		<p> Bleu Blanc Coeur est une solution pour notre santé </p>
	</div>
	


	<div class="clear"> </div>



	<h1> Le Boeuf  </h1>
	<br/>

	<div class="photo left-floating"> 
		<div class="lbl-photos"> 
			Côte <br/>
			de boeuf
		</div>
		<img src="img/boucherie/cote_de_boeuf_001.jpg" alt="Côte de boeuf" class="img-photos"/>
	</div>

	<div id="texte">
		
		<h2> Côte, Entrecôte et filet portés à maturation </h2>
	</div>



	<div class="clear"> </div>



	<h1> Le veau  </h1>
	<br/>
	<div class="photo left-floating"> 
		<div class="lbl-photos"> 
			Le Veau <br/>
		</div>
		<img src="img/boucherie/veau.jpg" alt="Le Veau" class="img-photos"/>
	</div>

	<div id="texte">
		
		<h2> Veau de tradition </h2>
	</div>

	

	<div class="clear"> </div>



	<h1> L'Agneau </h1>
	<br/>
	<div class="photo flash left-floating"> 
		<div class="lbl-photos"> 
			L'agneau <br/>
		</div>
		<object class="img-photos" height="350px" width="400px">
		    <param name="movie" value="flash/morceaux.swf">
		    <embed src="flash/morceaux.swf" width="400" height="400px">
		    </embed>
		</object>
	</div>

	<div id="texte">
		
		<h2> Agneau Le Baronnet </h2> <img src="img/boucherie/logo-baronnet.png" alt="L'agneau" class="img-logo"/>
	</div>

	<div class="center-alignement"> 
	</div>
	<div class="clear"> </div>
@endsection