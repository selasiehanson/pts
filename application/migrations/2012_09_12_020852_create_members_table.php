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
			$table->string("first_name");
			$table->string("last_name");
			$table->string("phone");
			$table->string("address");
			$table->date("date_of_birth");
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