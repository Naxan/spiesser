	<?php

	/*
	|--------------------------------------------------------------------------
	| Controller Boutique
	|--------------------------------------------------------------------------
	|
	|	Permet de gérer la partie boutique en ligne du site
	| 	->	Boutique <-
	|
	*/

class Boutique_Controller extends Base_Controller {
	public function action_accueil()
	{
		return View::make('boutique.boutique')
			->with('menuActive','4')
			->with('subMenuActive','1')
			->with('categories', Category::all());
	}
	public function action_chargement_catalogue() {
		$idCategorie = Input::get('idCategorie');
		$articles = Article::where('id_categorie', '=', $idCategorie)->get();
		return View::make('boutique.chargement-catalogue')
			->with('idCategorie',$idCategorie)
			->with('categorie', Category::find($idCategorie))
			->with('articles', $articles);
	}

	public function action_ajouter_article() {
		header('Content-Type: application/json');
		$session_articles = Session::get('session_articles');

		$idArticle = Input::get('numArticle');
		$nbArticle = Input::get('nbArticle');
		$actionArticle = Input::get('actionArticle');
        $indicationArticle = Input::get('indicationArticle');
		$quantiteTotal = 0;
        $quantiteArticle = 0;

		if (is_null($session_articles) && $actionArticle=="ajouter") {

			$session_articles = array(
				$idArticle	=> $nbArticle,
			);
		}
		else if (!isset($session_articles[$idArticle]) && $actionArticle=="ajouter") {
			$session_articles[$idArticle] = $nbArticle;
		}
		else {
			$tempNbArticles = $session_articles[$idArticle];
			if ($actionArticle == "ajouter") {
				$tempNbArticles+=$nbArticle;
			}
			else {
				$tempNbArticles-=$nbArticle;
				if ($tempNbArticles < 0)
					$tempNbArticles = 0;
			}
			$session_articles[$idArticle] = $tempNbArticles;
		}
		Session::put('session_articles',$session_articles);


		//construction du message retour
		foreach ($session_articles as $id => $quantite) {
			$quantiteTotal+=$quantite;
            if ($quantite > 0) {
                $quantiteArticle++;
            }
		}

		Session::put('total_articles',$quantiteArticle);

		$article = Article::find($idArticle);
		$message = 'Vous avez '.$session_articles[$idArticle].'x l\'article '.$article->article.' dans votre panier';
		$data = array(
		    'message'  => $message,
		    'quantiteTotalArticle' => $quantiteArticle,
		);
		echo json_encode($data);
	}

	public function action_initialiser_article() {
		Session::flush();
	}

	public function action_panier() {
		$session_articles = Session::get('session_articles');
		$articles = null;
        $categories = null;
		if (!$session_articles == null) {
			$array_id_articles = array_keys($session_articles);
			$articles = Article::where_in('id', $array_id_articles)->get();
            $categories = Category::all();
		}
		return View::make('boutique.panier')
			->with('menuActive','4')
			->with('subMenuActive','2')
			->with('articles', $articles)
            ->with('categories', $categories)
			->with('points_relais', Pointrelais::all())
			->with('session_articles', $session_articles);
	}



	public function action_modifier_nombre_article() {
		$nbArticles = Input::get("nbArticles");
		$idArticle = Input::get("idArticle");
		$session_articles = Session::get('session_articles');
		$session_articles[$idArticle] = $nbArticles;
		$quantiteTotal = 0;
        $quantiteArticle = 0;

		$articles = null;
		if (!$session_articles == null) {
			$array_id_articles = array_keys($session_articles);
			$articles = Article::where_in('id', $array_id_articles)->get();
		}

		foreach ($session_articles as $id => $quantite) {
			$quantiteTotal+=$quantite;
            if ($quantite > 0) {
                $quantiteArticle++;
            }
		}

		Session::put('total_articles',$quantiteArticle);
		Session::put('session_articles',$session_articles);

		return View::make('boutique.chargement-panier')
			->with('points_relais', Pointrelais::all())
			->with('articles', $articles)
			->with('session_articles', $session_articles);
	}

    
    //TODO : Changer le mail par celui de Christine (decommenter $mailChristine et commenter $mailChristine = $mailTest;
	public function action_validation_commande() {
		$pointRelais = Pointrelais::find(Input::get('idPointRelais'));
        $mailTest = 't.morice4@gmail.com';
        //$mailChristine = 'christine@boucherie-spiesser.fr';
        $mailChristine = $mailTest;
		$mailClient = Input::get('mail-client');
		$numeroClient = Input::get('numero-client');
		$nomClient = Input::get('nom-client');
		$prenomClient = Input::get('prenom-client');
		$session_articles = Session::get('session_articles');
		$articles = null;
		$articlesHTML = '';
		$randomIdOk = false;
		$randomId = "";
		$ligne=0;

		while (!$randomIdOk){
			$randomId = rand(999,999999);
			$commandeTemp = Commande::where('id', '=', $randomId)->first();
			if (empty($commandeTemp)){
				$randomIdOk = true;
			}
		}


		if (!$session_articles == null) {
			$array_id_articles = array_keys($session_articles);
			$articles = Article::where_in('id', $array_id_articles)->get();
		}

		foreach ($articles as $article) {
			if ($session_articles[$article->id] != 0) {
                $categorie = Category::where('id','=', $article->id_categorie)->first();
                $indication_vente_liste = explode("|", $article->indication_vente_liste);
                $indication_vente_portion = $indication_vente_liste[0];
				$articlesHTML = $articlesHTML.'<p> Categorie : <b>'.$categorie->categorie.'</b> '.$session_articles[$article->id].' '.$indication_vente_portion.' de l\'article :       <b>'.$article->article.'</b> </p>';
				$commande = new Commande;
				$commande->id = $randomId;
				$commande->ligne = $ligne;
				$commande->id_article = $article->id;
				$commande->nb_article = $session_articles[$article->id];
				$commande->save();
				$ligne++;
			}
		}

		// Get the Swift Mailer instance
		$mailer = IoC::resolve('mailer');

		// Construct the message Christine
		$messageSpiesser = Swift_Message::newInstance('Nouvelle commande en ligne réalisée')
		    ->setFrom(array($mailClient=>'Mr ou Mme '.$nomClient))
		    ->setTo(array($mailChristine=>'Mme Christine Spiesser'))
		    ->setBody('<h2> Commande réalisée par Mr ou Mme '.$nomClient.' '.$prenomClient.
		    	'</h2> <p> La référence de la commande :'.$randomId.' </p>'.
		    	'<p> Le point relais séléctionné : '.$pointRelais->titre.
		    	'<br/> Numéro de téléphone du client : '.$numeroClient.
		    	'<br/> Adresse mail du client : '.$mailClient.
		    	'</p> <h3> Liste des articles commandés : </h3>'.
				$articlesHTML,'text/html');

		// Construct the message for Client
		$messageClient = Swift_Message::newInstance('Commande réalisée sur le site de la Boucherie Spiesser')
		    ->setFrom(array($mailChristine=>'Commande sur le site de la Boucherie Spiesser'))
		    ->setTo(array($mailChristine=>$nomClient.' '.$prenomClient))
		    ->setBody('<h2> La Commande effectuée en ligne a bien été prise en compte'.
		    	'</h2> <p> La commande porte la référence suivante : '.$randomId.'</p> <p> - Le point relais séléctionné : '.
                '<a href='.$pointRelais->gmaps_link.'>'.$pointRelais->titre.'</a>'.    
                '<br/> - '.$pointRelais->indication_delai.
		    	'</p> <h3> Liste des articles commandés : </h3>'.
				$articlesHTML.'<br/> <p> Si vous souhaitez faire une modification sur votre commande,
				ou pour toute question, n\'hésitez pas à contacter Christine <ul> 
				<li> par mail à l\'adresse <b> chrtistine@boucherie-spiesser.fr </b> </li> 
				<li> sur la <b> <a href="http://www.boucherie-spiesser.fr/contact"> page de contact de notre site </b> </li>
				<li> ou directement par téléphone au <b> 06-08-43-21-31 </b> </li> </ul> </p>', 'text/html');


		// Send the email for Spiesser
		$mailer->send($messageClient);
		$mailer->send($messageSpiesser);

		Session::flush();
	}
}
