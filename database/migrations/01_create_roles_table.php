<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel roles.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            // Membuat kolom id sebagai primary key dengan auto-increment
            $table->id();  // Ini setara dengan $table->bigIncrements('id'); di Laravel 7 dan sebelumnya

            // Kolom name untuk menyimpan nama role
            $table->string('name');  // Tipe string untuk menyimpan nama role (misal: Admin, User)

            // Kolom untuk timestamps (created_at dan updated_at)
            $table->timestamps();  // Laravel akan menambahkan kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Hapus tabel roles jika migrasi dibatalkan.
     *
     * @return void
     */
    public function down()
    {
        // Menghapus tabel roles
        Schema::dropIfExists('roles');
    }
};
