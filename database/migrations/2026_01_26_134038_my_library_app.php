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
        //buat categories table

        Schema::create('book_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('deskripsi');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->integer('no_anggota');
            $table->text('alamat');
            $table->integer('no_hp');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->integer('rating')->nullable();
            $table->date('tahun_terbit');
            $table->foreignId('kategori_id')->nullable()->constrained('book_categories')->onDelete('cascade');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
            $table->string('cover');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('charts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('chart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chart_id')->nullable()->constrained('charts')->onDelete('cascade');
            $table->foreignId('book_id')->nullable()->constrained('books')->onDelete('cascade');
            $table->integer('qty');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->enum('status', ['menunggu', 'dipinjam', 'selesai', 'ditolak', 'telat pengembalian']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('borrowing_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrowing_id')->nullable()->constrained('borrowings')->onDelete('cascade');
            $table->foreignId('book_id')->nullable()->constrained('books')->onDelete('cascade');
            $table->integer('qty');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali_rencana');
            $table->date('tanggal_kembali_aktual')->nullable();
            $table->enum('status', ['menunggu', 'dipinjam', 'selesai', 'ditolak', 'telat pengembalian']);
            $table->integer('denda')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('archives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('book_id')->nullable()->constrained('books')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_categories');
        Schema::dropIfExists('members');
        Schema::dropIfExists('books');
        Schema::dropIfExists('charts');
        Schema::dropIfExists('chart_items');
        Schema::dropIfExists('borrowings');
        Schema::dropIfExists('borrowing_items');
        Schema::dropIfExists('archives');
    }
};
