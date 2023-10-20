<?php

use App\Models\Opd;
use App\Models\User;
use App\Models\Location;
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
        Schema::create('confrences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdfor(User::class);
            $table->foreignIdfor(Opd::class);
            $table->foreignIdfor(Location::class);
            $table->string('judul');
            $table->longText('keterangan')->nullable();
            $table->date('tanggal');
            $table->enum('status', ['enable', 'disable'])->default('enable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confrences');
    }
};
