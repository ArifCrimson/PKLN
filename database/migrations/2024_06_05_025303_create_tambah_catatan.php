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
        Schema::table('permohonan', function(Blueprint $table){
            $table->string('catatan_urusetia')->nullable();
            $table->string('catatan_pelulus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permohonan',function(Blueprint $table){
            $table->dropColumn('catatan_urusetia');
            $table->dropColumn('catatan_pelulus');
        });
    }
};
