<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->unsignedBigInteger('estate_id');

            $table->foreign('estate_id')->on('estates')
                ->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     *
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
