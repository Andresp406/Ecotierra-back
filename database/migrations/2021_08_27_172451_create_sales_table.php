<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->float('unit_price');
            $table->float('discount_percent', 4,2);
            $table->enum('state', ['pending', 'paid']);
            $table->float('total_price', 10, 2);
            $table->smallInteger('amount');
//            $table->foreignId('register_by')->constrained('users');
            $table->foreignId('client_id')->constrained('clients');
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
        Schema::dropIfExists('sales');
    }
}
