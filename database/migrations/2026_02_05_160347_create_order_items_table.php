<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
        $table->increments('id');
        $table->decimal('price', 8, 2);
        $table->integer('quantity')->unsigned();

        $table->unsignedBigInteger('product_id');
        $table->foreign('product_id')
              ->references('id')
              ->on('products')
              ->onDelete('cascade');

        $table->unsignedBigInteger('order_id');
        $table->foreign('order_id')
              ->references('id')
              ->on('orders')
              ->onDelete('cascade');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    Schema::table('order_items', function (Blueprint $table) {
        $table->dropForeign(['product_id']); // Eliminar la clau forana
        $table->dropForeign(['order_id']);   // Si també hi ha una clau forana a orders
    });

        Schema::dropIfExists('order_items');
    }
};
