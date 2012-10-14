<?php

class Create_Payments_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("payments", function ($table){
			$table->increments("id");
			$table->integer("member_id");
			$table->decimal("amount",10,2);
			$table->integer("currency_id");
			$table->integer("duration");
			$table->date("start_date");
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
		Schema::drop("payments");
	}

}