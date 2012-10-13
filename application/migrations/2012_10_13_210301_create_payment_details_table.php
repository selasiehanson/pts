<?php

class Create_Payment_Details_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("payment_details", function ($table){
			$table->increments("id");
			$table->integer("payment_id");
			
			$table->date("month");
			$table->integer("currency_id");
			$table->decimal("amount",10,2);

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
		Schema::drop("payment_details");
	}

}