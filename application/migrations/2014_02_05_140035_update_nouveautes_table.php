<?php

class Update_Nouveautes_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('nouveautes', function($t) {
                $t->drop_column('nouveaute');
                $t->text('texte');
                $t->string('type',16);
                $t->boolean('affiche');
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('nouveautes', function($t) {
                $t->string('nouveaute', 900);
                $t->drop_column('texte');
                $t->drop_column('type');
                $t->drop_column('affiche');
        });
	}

}