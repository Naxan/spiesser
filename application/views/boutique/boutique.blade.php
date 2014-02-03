@layout('layouts.global')

<!--  BOUTIQUE -->

@section('sous-menu')
	<br/> <br/>
@endsection

@section('content')
		<h1> Boutique en ligne </h1>
		<?php
		/*
		<div id="boutique-panier"> 
			<span id="boutique-nbArticles"> 
				{{Session::get('total_articles', function() {return 'Aucun ';});}}
			</span> 
			articles dans le panier <img src="../img/boutique/panier.gif"> 
		</div>
		*/ ?>
		<br/>
		<div id="boutique-categories">
			@foreach ($categories as $category)
				<a href="#" onclick='openCatalogue("{{$category->id}}")'>
					<div id="list-catalogue-{{$category->id}}" class="list-catalogue-elem">
						<div id="titre-catalogue"> Voir les articles </div>
						<div id="categorie-catalogue"> {{$category->categorie}} </div>
                        @if ($category->categorie_alsacien != "")
                            <div style="font-size : 1.1em; color:#963333"id="categorie-alsacien-catalgue"> &nbsp;"{{$category->categorie_alsacien}}" </div>
                        @else
                            <div style="font-size : 1.1em; color:#963333"id="categorie-alsacien-catalgue"> &nbsp; </div>
                        @endif

						<img id="open-catalogue-{{$category->id}}" class="open-catalogue" src="../img/boutique/open-catalogue-loupe.png">
					</div>
				</a>
			@endforeach
		</div>

		<div id="boutique-catalogue-actif"> 
		</div>

		<div id="affichage-panier"> 
			
		</div>
@endsection

@section('js-files')
	{{ HTML::script('js/menus.js')}}
	{{ HTML::script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js') }}
	{{ HTML::script('js/booklet/jquery.easing.1.3.js') }}
	{{ HTML::script('js/booklet/jquery.booklet.latest.min.js') }}
	{{ HTML::script('js/commande.js')}}
@endsection
