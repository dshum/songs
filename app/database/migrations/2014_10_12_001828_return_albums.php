<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReturnAlbums extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('year')->nullable();
			$table->integer('artist_id')->unsigned()->index();
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::table('songs', function ($table) {
			$table->string('number')->nullable();
			$table->integer('album_id')->
				unsigned()->index()->
				nullable()->default(null);
		});

		$table = \DB::connection()->getTablePrefix().'songs';

		DB::statement("ALTER TABLE $table ALTER COLUMN number TYPE INTEGER USING number::integer");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		$table = \DB::connection()->getTablePrefix().'songs';

		DB::statement("ALTER TABLE $table ALTER COLUMN number TYPE VARCHAR(255)");

		Schema::table('songs', function ($table) {
			$table->dropColumn('number');
			$table->dropColumn('album_id');
		});

		Schema::drop('albums');
	}

}
