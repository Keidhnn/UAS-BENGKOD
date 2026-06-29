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
        Schema::table('users', function (Blueprint $table) {
            // Karena kolom 'id_poli' sudah dibuat di migration users, 
            // kita hanya perlu menambahkan aturan relasinya (foreign key) ke tabel 'polis'
            $table->foreign('id_poli')
                  ->references('id')
                  ->on('poli') // Ganti menjadi 'poli' jika nama tabel di databasemu tidak pakai 's'
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_poli']);
        });
    }
};