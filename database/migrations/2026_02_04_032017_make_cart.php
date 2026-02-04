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
        Schema::table('carts', function(Blueprint $table){
            $table->id();
            $table->timeStamps();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->softDeletes();
        });

        Schema::table('cart_items', function(Blueprint $table){
            $table->id();
            $table->timeStamps();
            $table->foreignId('cart_id')->nullable()->constrained('carts')->onDelete('cascade');
            $table->foreignId('book_id')->nullable()->constrained('books')->onDelete('cascade');
            $table->integer( 'qty');
            $table->date( 'tanggal_pinjam');
            $table->date( 'tanggal_kembali');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('cart_items');
    }
};
