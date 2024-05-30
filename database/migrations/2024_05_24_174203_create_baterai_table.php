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
        Schema::create('baterai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan')->constrained('users')->onDelete('cascade');
            $table->integer('persentase_baterai');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baterai');
    }
};
