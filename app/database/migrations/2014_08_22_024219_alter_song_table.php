<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('songs', function ($table) {
			$table->dropColumn('number');
			$table->dropColumn('album_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('songs', function ($table) {
			$table->string('number')->nullable();
			$table->integer('album_id')->unsigned()->index()
				->nullable()->default(null);
		});
	}

}
