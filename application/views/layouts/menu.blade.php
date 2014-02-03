<?php
/*
|--------------------------------------------------------------------------
| Menu Layout
|--------------------------------------------------------------------------
|
|	Gestion du menu principale du site
|
*/

	//Class Menu
	class Menu
	{
		public $id; 		// ID ou ordre d'apparition de l'element du menu
		public $libelle; 	// Libellé ou nom du menu qui sera affiché
		public $url; 		// Url permettant d'acceder à l'élément
	    public $subMenu;	// Si il possède des sous-menu 
	    public $hasSubMenu;

	    function __construct($id, $libelle, $url, $subMenu) {
	        $this->id = $id;
	        $this->libelle = $libelle;
	        $this->url = $url;
	        if (is_null($subMenu)){
	        	$this->hasSubMenu = false;
	        }
	        else {
	        	$this->hasSubMenu = true;
	        	$this->subMenu = $subMenu; 
	        }
	    }
	}

	/*
	|-----------------------------------
	| SOUS-MENU
	|-----------------------------------
	*/
	//ACCUEIL
	$accueilSubMenu1 = new Menu("1","Bienvenue", "../", null);
	$accueilSubMenu2 = new Menu("2","Medias & Revue de presse", "../presse", null);
	$accueilSubMenu3 = new Menu("3","Le Point Traiteur", "../traiteur", null);
	$accueilSubMenu4 = new Menu("4","Les recettes de christine", "../recettes", null);
	$accueilSubMenu5 = new Menu("5","Nous contacter","../contact",null);
	$accueilSubMenu6 = new Menu("6","Sondage","../sondage",null);
	$accueilSubMenu = array($accueilSubMenu1, $accueilSubMenu2, $accueilSubMenu3, $accueilSubMenu4, $accueilSubMenu5, $accueilSubMenu6);


	//BOUCHERIE...
	$boucher1 = new Menu("1","La Boucherie","../boucherie",null);
	$boucher2 = new Menu("2","La Charcuterie","../charcuterie",null);

	$boucherSubMenu = array($boucher1, $boucher2);


	//BOUTIQUE...
	$boutique1 = new Menu("1","Commande en ligne","../boutique",null);
	$boutique2 = new Menu("2","Mon panier","../panier",null);
	//$boutique3 = new Menu("3","Point traiteur","../traiteur",null);
	$boutique3 = new Menu("3","Mentions légales","../mentions",null);
	
	$boutiqueSubMenu = array($boutique1, $boutique2, $boutique3);



	/*
	|-----------------------------------
	| MENUS
	|-----------------------------------
	*/

	$accueilMenu = new Menu("1","Accueil","../", $accueilSubMenu);
	$boucherieMenu = new Menu("2","La Boucherie / Charcuterie","../boucherie", $boucherSubMenu);
	//$traiteurMenu = new Menu("3","Le Traiteur","../traiteur", null);
	$marcheMenu = new Menu("3", "Au Marché", "../marches", null);
	$boutiqueMenu = new Menu("4", "La Boutique en ligne", "../boutique", $boutiqueSubMenu);
	$promotionsMenu = new Menu("5", "Nouveautés", "../news", null);


	$menus = array($accueilMenu, $boucherieMenu, $marcheMenu, $boutiqueMenu, $promotionsMenu);

	$activeSubMenus;

?>


@section('js-files')
	{{ HTML::script('js/menus.js') }}
@endsection
	
<div id="menu">
	<ul> 
		@foreach ($menus as $menu)
			<li id="li-menu-elem{{$menu->id}}" class="li-menu-elem
			@if ($menu->id == $menuActive)
				<?php $activeSubMenus = $menu->subMenu; ?>
				active
			@endif
			">
			<a href="{{$menu->url}}">  {{$menu->libelle}} </a> 
			</li>
			@if ($menu->id == $menuActive)
				<span class="active-after"> </span>
			@endif
		@endforeach
	</ul>
</div>


@if (!is_null($activeSubMenus))
	<div id="subMenu">
		<ul> 
			@foreach ($activeSubMenus as $subMenu)
				<li id="li-subMenu-elem{{$subMenu->id}}" class="li-subMenu-elem
					@if ($subMenu->id == $subMenuActive)
						active
					@endif
					">
					@if($subMenu->url == '../panier')
						<a id="nb-articles-total" href="{{$subMenu->url}}">  {{$subMenu->libelle}} ({{Session::get('total_articles', function() {return '0';});}}) </a> 
					@else
						<a href="{{$subMenu->url}}">  {{$subMenu->libelle}} </a> 
					@endif
				</li>
			@endforeach
		</ul>
	</div>
@endif
