<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("users", function ($table){
			$table->increments("id");
			$table->string("first_name");
			$table->string("last_name");
			$table->string("user_name",128);
			$table->string("email")->unique();
			$table->string("password",64);
			$table->integer("role");
			$table->boolean("active");
			$table->timestamps();
		});
		
		//ADD A Default User
		DB::table("users")->insert(array(
			"first_name" => "admin",
			"last_name" => "admin",
			"user_name"=> "admin",
			"email" => "soundfever18@gmail.com",
			"password" => Hash::make("admin")
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("users");
	}

}