<?php

class Create_Commandes_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commandes', function($table) {
			$table->string('reference', 8);
			$table->integer('ligne');
			$table->integer('id_article');
			$table->integer('nb_article');
			$table->timestamps();	
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}