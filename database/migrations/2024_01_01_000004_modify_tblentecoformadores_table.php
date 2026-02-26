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
        Schema::table('tblentecoformadores', function (Blueprint $table) {
            // Alterar los campos para que sean nullable
            $table->string('tdoc')->nullable()->change();
            $table->string('numdoc')->nullable()->change();
            $table->string('razonsocial')->nullable()->change();
            $table->string('direccion')->nullable()->change();
            $table->string('telefono')->nullable()->change();
            $table->string('correoinstitucional')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tblentecoformadores', function (Blueprint $table) {
            $table->string('tdoc')->nullable(false)->change();
            $table->string('numdoc')->nullable(false)->change();
            $table->string('razonsocial')->nullable(false)->change();
            $table->string('direccion')->nullable(false)->change();
            $table->string('telefono')->nullable(false)->change();
            $table->string('correoinstitucional')->nullable(false)->change();
        });
    }
};
