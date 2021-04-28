<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('budget_item')) 
        {
            Schema::create('budget_item', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('name');
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id')->references('id')->on('categories');
                $table->date('payment_date')->nullable();
                $table->integer('amount')->default(0);
                $table->boolean('should_alert')->default(false);
                $table->integer('order')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_item');
    }
}
