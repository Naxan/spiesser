<?php 

/*
 * SPIESSER Models
 * clients
 * Licence CC-BY http://creativecommons.org/licenses/by/3.0/fr/
*/

class User extends Eloquent {
	public static $table = "users";
	public static $rules = array(
		//'mail' => 'required|email|unique:clients',
	);
}