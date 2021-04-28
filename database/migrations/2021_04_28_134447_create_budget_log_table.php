<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_log', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('budget_item_id')->unsigned();
            $table->foreign('budget_item_id')->references('id')->on('budget_item')->nullable();
            $table->date('payment_date')->nullable();
            $table->integer('amount')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('budget_log');
    }
}
