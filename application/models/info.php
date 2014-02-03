<?php 

/*
 * SPIESSER Models
 * Infos
 * Licence CC-BY http://creativecommons.org/licenses/by/3.0/fr/
*/

class Info extends Eloquent {
	public static $table = "infos";
	public static $rules = array(
		'information' => 'required',
	);
	public static $messages = array(
	    'required' => 'Aucune information n\'a été insérée',
	);
	public static function validate($data){
		return Validator::make($data, static::$rules, static::$messages);
	}
}