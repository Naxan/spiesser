<?php 

/*
 * SPIESSER Models
 * clients
 * Licence CC-BY http://creativecommons.org/licenses/by/3.0/fr/
*/

class Client extends Eloquent {
	public static $table = "clients";
	public static $rules = array(
		'mail' => 'required|email|unique:clients',
	);
	public static $messages = array(
	    'required' => 'L\'adresse mail n\'a pas été renseigné',
	    'email' => 'L\'email indiqué n\'est pas une adresse valide',
	    'mail_unique' => 'Vous êtes déjà abonné à la lettre d\'information',
	);
	public static function validate($data){
		return Validator::make($data, static::$rules, static::$messages);
	}
}