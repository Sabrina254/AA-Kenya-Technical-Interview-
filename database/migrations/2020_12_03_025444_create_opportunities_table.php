<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();

            $table->bigInteger('createdByUserId')->unsigned();
            $table->foreign('createdByUserId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('organisationId')->unsigned();
            $table->foreign('organisationId')->references('id')->on('organisations')->onDelete('cascade')->onUpdate('cascade');

            $table->longText('name');
            $table->longText('description');

            $table->bigInteger('salary');

            $table->longText('stage');


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
        Schema::dropIfExists('opportunities');
    }
}
