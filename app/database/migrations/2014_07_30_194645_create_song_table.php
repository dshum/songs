<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('songs', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('number');
			$table->text('text')->nullable()->default(null);
			$table->integer('artist_id')->unsigned()->index();
			$table->integer('album_id')->unsigned()->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('songs');
	}

}
