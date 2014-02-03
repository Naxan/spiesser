<?php

class Create_Nouveautes_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nouveautes', function($table) {
			$table->increments('id');
			$table->string('nouveaute');
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
		Schema::drop('nouveautes');	}

}
