<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetention extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retention', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('created_at');
            $table->integer('onboarding_perentage');
            $table->integer('count_applications');
            $table->integer('count_accepted_applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retention');
    }
}
