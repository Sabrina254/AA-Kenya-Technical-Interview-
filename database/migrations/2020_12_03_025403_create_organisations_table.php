<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();

            $table->engine = "InnoDB";

            $table->bigInteger('createdByUserId')->unsigned();
            $table->foreign('createdByUserId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->longText('name');
            $table->longText('description');
            $table->longText('location');
            $table->longText('address');

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
        Schema::dropIfExists('organisations');
    }
}
