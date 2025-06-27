<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Perintah ini akan dieksekusi saat kamu menjalankan `php artisan migrate`.
     * Fungsinya adalah membuat tabel `sessions` dengan kolom-kolom standar Laravel.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Kolom ID sesi, unik dan jadi primary key
            $table->foreignId('user_id')->nullable()->index(); // ID user yang login, bisa kosong untuk tamu, di-index agar cepat
            $table->string('ip_address', 45)->nullable(); // Alamat IP user
            $table->text('user_agent')->nullable(); // Info browser user
            $table->longText('payload'); // Data sesi utama yang disimpan (data login, dll)
            $table->integer('last_activity')->index(); // Waktu aktivitas terakhir, di-index agar cepat
        });
    }

    /**
     * Reverse the migrations.
     *
     * Perintah ini akan dieksekusi saat kamu menjalankan `php artisan migrate:rollback`.
     * Fungsinya adalah menghapus tabel `sessions` jika ada.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};