<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments("id");
            $table->string("user_id");
            $table->string("courier_id")->nullable();
            $table->string("product_id");
            $table->string("address_id");
            $table->string("status_id");
            $table->string("vendor_id");
            $table->string("method_id");
            $table->string("quantity");
            $table->string("total_price");
            $table->datetime("datetime");
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
        Schema::dropIfExists('orders');
    }
}
