<?php

class Create_Members_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("members", function($table){
			$table->increments("id");
			$table->string("firstname");
			$table->string("lastname");
			$table->string("phone");
			$table->string("address");
			$table->date("dateofbirth");
			$table->integer("created_by"); 
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
		Schema::drop("members");
	}

}