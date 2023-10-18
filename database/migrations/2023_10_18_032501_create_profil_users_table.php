<?php

use App\Models\Opd;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil_users', function (Blueprint $table) {

            $table->uuid('id')->primary();
            $table->foreignIdfor(User::class);
            $table->foreignIdfor(Opd::class);
            $table->string('nip');
            $table->string('jabatan');
            $table->string('nohp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_users');
    }
};
