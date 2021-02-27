<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            //not active => 0 | active => 1
            $table->boolean('is_active')->default(0);
            //rent => 0 | sale => 1
            $table->boolean('rent_or_sale')->default(0);

            $table->integer('number_month')->nullable();

            $table->integer('price');
            $table->integer('space');

            $table->text('location_description');

            $table->double('x_latitude',9,6);
            $table->double('y_longitude',9,6);

            $table->json('specifications');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('realEstateRegistry_id');
            $table->unsignedBigInteger('realEstateType_id');

            $table->foreign('area_id')->on('areas')
                ->references('id');

            $table->foreign('user_id')->on('users')
                ->references('id');

            $table->foreign('realEstateRegistry_id')->on('real_estate_registries')
                ->references('id');

            $table->foreign('realEstateType_id')->on('real_estate_types')
                ->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estates');
    }
}
