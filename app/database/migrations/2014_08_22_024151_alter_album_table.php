<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAlbumTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('albums');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('albums', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('year');
			$table->integer('artist_id')->unsigned()->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

}
