@layout('layouts.global')

<!--  MARCHES -->

@section('sous-menu')
	<br/> <br/>
@endsection

@section('content')


	<h1> Les nouveautés !</h1>

	<div id="tableaux">
		<div class="tableau-promotions">
			 <img id="logo" src="./img/header/header-logo.png"/> <div id="titre-promotions"> Chers Clients </div>
			 {{--$nouveaute->nouveaute--}}
            <p style="font-size : 2.4em; text-decoration : none;"> Arrivage cette semaine </p>  <p> </p> <br/>
            <p style="font-size : 2.2em; margin-top : -50px;"> Cuissot de porcelets
                <br/> Cotes fraîches
                <br/>
                <div style="font-size : 2.7em; margin-top : 10px;"> Ibérique ! </div>
            </p>


            <p style="font-size : 1.7em; text-decoration : none; margin-top : 0px;"> Vraiment exceptionnel !!! </p>
            <!--
            <p style="font-size : 1.7em;">    Entrecôtes de Veau <br/>
                Onglet de Veau </p>
              <p style="font-size : 1.6em;">  et toujours notre <br/>
                <b> Boeuf Angus ! </b>
                <br/> <br/> <br/>
            </p>
    -->

		</div>


		<div class="tableau-promotions">
			 <img id="logo" src="./img/header/header-logo.png"/> <div id="titre-promotions"> Promo de la semaine </div>
			 {{--$nouveaute->nouveaute--}}

            <p style="font-size : 1.65em; text-decoration : none; margin-top : 70px; margin-left : 20px;">
                3 steaks de boeuf  haches + 1 gratuit <br/> <br/>
                3 tranches jambon à l'os + 1 gratuite <br/> <br/>
                3 lasagnes à la bolognaise + 1 gratuite <br/> <br/>
                3 boudins noir le vrai + 1 gratuit <br/> <br/>
                3 escalopes de poulet + 1 gratuite. <br/> <br/>
            <!--
            <p style="font-size : 1.7em;">    Entrecôtes de Veau <br/>
                Onglet de Veau </p>
              <p style="font-size : 1.6em;">  et toujours notre <br/>
                <b> Boeuf Angus ! </b>
                <br/> <br/> <br/>
            </p>
    -->
            </p>
		</div>
	</div>


	<h1> Une histoire de famille </h1>
	<br/>
	<div class="photo left-floating"> 
		<div class="lbl-photos"> 
			Christine Spiesser <br/>
			Maître Artisan Boucher Charcutier
		</div>
		<img src="img/photos/christine-spiesser.jpg" alt="Christine Spiesser" class="img-photos"/>
	</div>
	<div id="texte">
		
		<h2> Christine et son équipe vous souhaitent la bienvenue ! </h2>
		
		<h3> Une vision féminine pour une rencontre entre <b> Tradition et Innovation </b> </h3>
		
		<p> La boucherie charcuterie SPIESSER est une entreprise familiale fondée en 1981 à Holtzheim. </p>
		
		<p> Les parents de Christine SPIESSER ont démarré l'affaire avec un ouvrier. Ils déménagent dans un local plus grand en 1985,
			visant à diversifier leur clientèle, alors constitués des seuls habitants du village. 
		</p>
		
		<p> Première fille à obtenir son <b> Brevet de Maîtrise de boucher-charcutier avec mention, </b> Christine rejoint l'affaire en 1988. 
			Elle développe alors les marchés sur Strasbourg, Colmar et le Kochersberg. 
		</p>
		
		<p> Aujourd'hui, véritable chef d'entreprise, elle est avant tout au service de sa clientèle. C'est ainsi que vous la retrouverez sur les 		différents marchés. Très fière de sa dernière acquisition, un camion de 12 tonnes. Y sont présentés 12 mètres de linéaires de produits.
			Charcuteries élaborées à partir de porc Lisenheim; Viandes sélectionnées et Labels de la volaille Fermière Produits traiteur revus.
			Le tout avec une attention particulière à notre santé à tous.
		</p>
		
		<p> Christine souhaite avant tout promouvoir une viande de choix et de qualité. La France regorge de produits qui méritent d'être proposées </p>
		
		<p> Chez Christine, on fabrique la charcuterie de A à Z, à partir des viandes de boeuf, porc, agneau et veau achetées en carcasses. Les traditionnels knacks, cervelas, saucisses de viande sont préparés en boyau naturel, << matière qui respire, mais à durée de vie courte, qui oblige à une production quotidienne >>. Plus de 80 variétés de charcuteries sont fabriqués chaque année, renouvelées selon les saisons. Ce sont les galantines préparées avec de la chair à saucisse et des légumes, poivrons, aubergines, champignons noirs, de Paris ou girolles, les pâtés aux griottes, ou à la liqueur de mirabelle. Régulièrement, Christine invente de nouvelles recettes pour surprendre et satisfaire ses clients. </p>

		<b> << J'ai toujours envie de faire mieux pour que le client ne se lasse pas. >> </b>

		<p> Créer, innover et partager avec ses clients. Affectionnant particulièrement ls marchés, pour l'ambiance sympathique qui y règne. <br/>
		J'ai un métier passionant, j'espère qu'il retrouvera ses lettres de noblesse. Premier convaincu, son mari met l'accent sur la diversité de dimensions des postes que la profession recouvre, de la fabrication à la vente de produits. <br/> Arrivera-t-on pour autant à susciter des candidatures ? </p>

		<div class="center-alignement"> 
			<h3> Puisse ma passion être communicative <br/>
				<b> Entre Tradition et Innovation </b> <br/>
				Bon appétit ! </h3>
		</div>

	</div>


@endsection
