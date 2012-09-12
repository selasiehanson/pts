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
			$table->string("firstname");
			$table->string("lastname");
			$table->string("username");
			$table->string("email")->unique();
			$table->string("password");
			$table->timestamps();
		});
		
		//ADD A Default User
		DB::table("users")->insert(array(
			"firstname" => "admin",
			"lastname" => "admin",
			"username"=> "admin",
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