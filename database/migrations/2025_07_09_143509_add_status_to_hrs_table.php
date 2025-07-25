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
        Schema::table('hrs', function (Blueprint $table) {
            $table->boolean('status')->default(1); // 1 = active/unblocked, 0 = blocked
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hrs', function (Blueprint $table) {
            //
        });
    }
};
