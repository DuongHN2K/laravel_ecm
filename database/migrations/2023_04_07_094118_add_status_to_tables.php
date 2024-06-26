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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->tinyInteger('status')->default('0');
        });

        Schema::table('products', function (Blueprint $table) {
            //
            $table->tinyInteger('status')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->dropColumn('navbar_status');
            $table->dropColumn('status');
        });

        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
    }
};
