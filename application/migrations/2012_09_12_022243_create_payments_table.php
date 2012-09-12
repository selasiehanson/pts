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
			$table->string("duration");
			$table->date("paymentdate");
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