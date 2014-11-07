<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$table_name = Config::get('simple-admin::auth.permission_table');
		Schema::create($table_name, function($table)
		{
			$table->increments('id');
			$table->integer('admin_id');
			$table->text('permissions');
			$table->timestamps();
			$table->softDeletes();
			$table->engine = 'InnoDB';
		});
		$auto_admin_id = DB::table(Config::get('simple-admin::auth.auth_table'))->where('username','=','admin')->first()->id;
		DB::table($table_name)->insert(
			array('admin_id'=>$auto_admin_id,'permissions'=>'__ALL__')
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table_name = Config::get('simple-admin::auth.permission_table');
		Schema::dropIfExists($table_name);
	}

}
