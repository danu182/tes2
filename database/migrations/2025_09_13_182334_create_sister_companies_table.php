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
        Schema::create('sister_companies', function (Blueprint $table) {
            $table->id();

            $table->string('code', 100);
            $table->string('name', 150);
            $table->string('picUser', 150)->nullableO();
            $table->string('tlp', 100)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('address', 150);
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sister_companies');
    }
};
