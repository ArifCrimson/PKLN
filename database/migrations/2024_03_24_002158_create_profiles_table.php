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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('yb_categories_id');
            $table->foreign('yb_categories_id')->references('id')->on('yb_categories');
            $table->string('portfolio_name');
            $table->unsignedBigInteger('panggilan_id');
            $table->foreign('panggilan_id')->references( 'id' )->on('panggilan') ;
            $table->string('name', length: 500);
            $table->string('no_kp')->unique();
            $table->string('jawatan_hakiki', length: 500);
            $table->string('gelaran_di_jawatan', length: 500);
            $table->string('address_1', length: 500)->nullable();
            $table->string('address_2', length: 500)->nullable();
            $table->string('address_3', length: 500)->nullable();
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('gambar_attach_1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
