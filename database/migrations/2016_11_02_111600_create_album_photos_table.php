<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id')->unsigned();

            // it'll be necessary if few people may add new photo in album
            $table->integer('owner_id')->unsigned();
            $table->string('title', 100)->nullable();
            $table->text('description')->nullable();

            // name of the file in directory
            $table->string('filename', 100);

            // original name that was when file was uploaded
            $table->string('original_name', 100);
            $table->integer('likes')->default(0);
            $table->timestamps();


            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
