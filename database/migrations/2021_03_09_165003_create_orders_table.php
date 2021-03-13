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
            $table->id();
            $table->string('guest_name')->nullable();
            $table->string('guest_address')->nullable();
            $table->char('order_number',6)->required()->unique(); // #00000
            $table->float('total_price',5,2)->required();
            $table->string('status', 10)->default('In attesa'); // pagato, consegnato, in attesa
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
