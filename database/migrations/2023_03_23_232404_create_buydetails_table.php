<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuydetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buydetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buy_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('quantity', 10, 2);
            $table->decimal('cost', 10, 2);
            $table->foreign('buy_id')->references('id')->on('buys')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('buydetails');
    }
}
