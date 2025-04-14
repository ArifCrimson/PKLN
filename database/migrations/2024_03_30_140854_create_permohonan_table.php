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
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->date('tempoh_lawatan_start');
            $table->date('tempoh_lawatan_end');
            $table->unsignedBigInteger('negara_id');
            $table->foreign('negara_id')->references('id')->on('negara');
            $table->string('tujuan_lawatan')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->unsignedBigInteger('status_permohonan_id');
            $table->foreign('status_permohonan_id')->references('id')->on('status_permohonan');
            $table->unsignedBigInteger('profiles_id');
            $table->foreign('profiles_id')->references('id')->on('profiles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan');
    }
};
