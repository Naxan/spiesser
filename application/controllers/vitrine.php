	<?php

	/*
	|--------------------------------------------------------------------------
	| Controller Vitrine
	|--------------------------------------------------------------------------
	|
	|	Permet d'afficher les pages vitrine du site
	| 	->	Accueil / Boucherie / Traiteur / Marché		<-
	|
	*/

class Vitrine_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| ACCUEIL
	|--------------------------------------------------------------------------
	*/

	public function action_index()
	{
		return View::make('vitrine.news')
			->with('menuActive','1')
			->with('subMenuActive','1');
	}

	public function action_presse()
	{
		return View::make('vitrine.presse')
			->with('menuActive','1')
			->with('subMenuActive','2');
	}

	/*
	public function action_catalogues()
	{
		return View::make('vitrine.catalogues')
			->with('menuActive','1')
			->with('subMenuActive','3');
	}
	*/
	public function action_traiteur()
	{
		return View::make('vitrine.traiteur')
			->with('menuActive','1')
			->with('subMenuActive','3');
	}


	public function action_recettes()
	{
		return View::make('vitrine.recettes')
			->with('menuActive','1')
			->with('subMenuActive','4');
	}


	public function action_contact()
	{
		return View::make('vitrine.contact')
			->with('menuActive','1')
			->with('subMenuActive','5');
	}

	public function action_sondage()
	{
		return View::make('vitrine.sondage')
			->with('menuActive','1')
			->with('subMenuActive','6');
	}

	/*
	|--------------------------------------------------------------------------
	| BOUCHERIE
	|--------------------------------------------------------------------------
	*/
	public function action_boucherie()
	{
		return View::make('vitrine.boucherie')
			->with('menuActive','2')
			->with('subMenuActive','1');
	}

	public function action_charcuterie()
	{
		return View::make('vitrine.charcuterie')
			->with('menuActive','2')
			->with('subMenuActive','2');
	}




	/*
	|--------------------------------------------------------------------------
	| MARCHES
	|--------------------------------------------------------------------------
	*/
	public function action_marches()
	{
		return View::make('vitrine.marches')
			->with('menuActive','3')
			->with('subMenuActive','1');
	}






	/*
	|--------------------------------------------------------------------------
	| BOUTIQUE
	|--------------------------------------------------------------------------
	*/

	public function action_commande()
	{
		return View::make('vitrine.commande')
			->with('menuActive','4')
			->with('subMenuActive','1');
	}





	/*
	public function action_boutique()
	{
		return View::make('vitrine.traiteur')
			->with('menuActive','5')
			->with('subMenuActive','1');
	}
	*/




	public function action_mentions()
	{
		return View::make('vitrine.mentions')
			->with('menuActive','4')
			->with('subMenuActive','4');
	}

	public function action_news()
	{
		Auth::login(0);
		return View::make('vitrine.news')
			->with('menuActive','5')
			->with('subMenuActive','1')
			->with('nouveaute', Nouveaute::first());
	}	

	/*
	|-----------------------------------
	| Inscription à la newsletter
	|-----------------------------------
	*/
	public function action_inscriptionNewsletter(){
		$validation = Client::validate(Input::all());
		$errorString = 'Erreur(s) : <br/>';
		$response;
		if ($validation->fails()){
			foreach ($validation->errors->all() as $error) {
				$errorString = $errorString.$error.'<br/>';
			};
			$response = array('erreur' => true, 'content' => $errorString );
		}
		else {
			Client::create(array(
				'mail' => Input::get('mail'),
			));
			$response = array('content' => 'Vous êtes désormais abonné à la lettre d\'information');
		}
		return json_encode($response);
	}

	/*
	|-----------------------------------
	| Ajout d'un produit dans la session et à la liste des produits
	|-----------------------------------
	*/
	public function action_ajoutProduit(){
		//$produit = json_decode($_POST['produit']);

		/*
		$numProduit = Session::get('numProduit');
		//$produit = 
		if (is_null($num_produit)){
			$num_produit = 1;
		}
		else {
			$num_produit++;
		}

		Session::put('listeProduit', $)

		Session::put('numArticle', $num_article);
		*/
	}

	public function action_envoyerMail(){
		$mailer = IoC::resolve('mailer');
		$nom = Input::get('nom');
		$prenom = Input::get('prenom');
		$numero = Input::get('numero');
		$mail = Input::get('mail');
		$msg = Input::get('message');

		if ($nom == ''){
			$nom = 'inconnu';
		}

		if ($numero == ''){
			$numero = 'non indiqué';
		}


		$message = Swift_Message::newInstance("Message reçu depuis boucherie-spiesser.fr -> ".$prenom.' '.$nom.'  Numéro '.$numero)
		    ->setFrom(array($mail=>$prenom.' '.$nom))
	    	->setTo(array('christine@boucherie-spiesser.fr'=>'Christine SPIESSER'))
	    	->addPart($msg,'text/plain');

	    	// Send the email
			$mailer->send($message);
	}
			
}
