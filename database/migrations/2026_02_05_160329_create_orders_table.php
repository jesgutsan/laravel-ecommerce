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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Això crea la columna id de tipus unsignedBigInteger per defecte
            $table->decimal('subtotal', 8, 2); // Preu total sense enviament
            $table->decimal('shipping', 8, 2); // Despeses d'enviament
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
            $table->dropForeign(['product_id']); // Eliminar la clau foránea
    });
        Schema::dropIfExists('orders');
    }
};
