@layout('layouts.global')

<!--  CONTACT -->


@section('content')
<?php /* mode 1 
	<form id="form-mail-contact" action="../envoyer-mail" method="post">
		<label for="input-nom"> Indiquez votre nom : </label>  <input id="input-nom" name="nom" type="text" placeholder="Votre nom"/> 
		<label for="input-prenom"> Indiquez votre prénom : </label> <input id="input-prenom" name="prenom" type="text" placeholder="Votre prénom"/>
		<label for="input-numero"> Indiquez votre numéro de téléphone : </label> <input id="input-numero" name="numero" type="tel" placeholder="Votre numéro de téléphone"/>
		<label for="input-mail"> Indiquez votre adresse mail : </label> <input id="input-mail" class="required" name="mail" type="text" placeholder="Votre adresse mail (requis)"/>
		<label for="input-message"> Entrez votre message : </label> <textarea id="input-message" class="required" name="message" placeholder="Votre message (requis)"></textarea>
		<input type="submit" value="Envoyer"/>
	</form>
*/ ?> 

<?php /* mode 2 
*/ ?>
	<form id="form-mail-contact" action="../envoyer-mail" method="post">
		<div id="form-elem"> 
			<span id="label-form" for="input-nom"> Nom de famille : </span> 
			<span id="label-form-arrow">  </span>
			<input id="input-nom" name="nom" type="text"/>  
		</div>

		<div id="form-elem"> 
			<span id="label-form" for="input-prenom"> Votre prénom : </span> 
			<span id="label-form-arrow">  </span>
			<input id="input-prenom" name="prenom" type="text"/>
		</div> 

		<div id="form-elem"> 
			<span id="label-form" for="input-numero"> N° de téléphone : </span> 
			<span id="label-form-arrow">  </span>
			<input id="input-numero" name="numero" type="tel"/>
		</div>

		<div id="form-elem"> 
			<span id="label-form" for="input-nom"> Adresse mail : </span> 
			<span id="label-form-arrow">  </span>
			<input id="input-mail" class="required" name="mail" type="text"/>
		</div>

		<div id="form-elem"> 
			<span id="label-form" for="input-nom"> Votre message : </span> 
			<span id="label-form-arrow">  </span>
			<textarea id="input-message" class="required" name="message">&nbsp;</textarea>
		</div>
		<div id="form-elem">
			<input id="submit-form" type="submit" value="Envoyer"/>
		</div>
	</form>




	<div id="message-envoye">
		<h2> Le message a bien été envoyé et sera pris en compte dans les plus brefs délais </h2>
		<h3> Merci </h3>
	</div>

@endsection
