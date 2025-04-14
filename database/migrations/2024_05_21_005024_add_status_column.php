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
        Schema::table('permohonan',function(Blueprint $table){
            $table->string('status')->nullable();
            $table->timestamp('accepted_by_urusetia_at')->nullable();
            $table->timestamp('approved_by_pelulus_at')->nullable();
            $table->timestamp('notice_to_pemohon_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permohonan',function(Blueprint $table){
            $table->dropColumn('status');
            $table->dropColumn('accepted_by_urusetia_at');
            $table->dropColumn('approved_by_pelulus_at');
            $table->dropColumn('notice_to_pemohon_at');
        });
    }
};
