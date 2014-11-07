<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$table_name = Config::get('simple-admin::auth.auth_table');
		Schema::create($table_name, function($table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('password',100);
			$table->timestamps();
			$table->rememberToken();
			$table->softDeletes();
			$table->engine = 'InnoDB';
		});
		$password = str_random(12);
		echo "The admin password is : {$password}\n";
		DB::table($table_name)->insert(
			array('username'=>'admin','password'=>Hash::make($password))
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table_name = Config::get('simple-admin::auth.auth_table');
		Schema::dropIfExists($table_name);
	}

}
