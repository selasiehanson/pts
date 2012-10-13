<?php

class Create_Currency_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("currencies", function($table){
			$table->increments("id");
			$table->string("name");
			$table->string("symbol");
			$table->timestamps();
		});

		DB::table("currencies")->insert(array(
			"name" => "Ghana Cedis",
			"symbol" => "GHC"
		));
		DB::table("currencies")->insert(array(
			"name" => "US Dollars",
			"symbol" => "USD"
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("currencies");
	}

}