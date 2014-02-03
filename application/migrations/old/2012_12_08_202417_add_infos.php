<?php

class Add_Infos {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('infos')->insert(array(
			'information' => 'Venez découvrir le <a href=""> menu de la semaine </a>',
			'created_at'=>date("Y-m-d H:m:s"),
			'updated_at'=>date("Y-m-d H:m:s")
		));

		DB::table('infos')->insert(array(
			'information' => 'Récupérer votre plat dans le relais boutique le plus proche',
			'created_at'=>date("Y-m-d H:m:s"),
			'updated_at'=>date("Y-m-d H:m:s")
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('infos')->where('id', '>', '0')->delete();
	}

}
