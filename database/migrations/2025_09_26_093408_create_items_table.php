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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('kodeItem')->unique();
            $table->string('nameItem')->unique();
            $table->bigInteger('categoryItem_id');
            $table->bigInteger('tipeItem_id');
            $table->bigInteger('uom_id');
            $table->string('barcode')->nullable();
            $table->string('foto')->nullable();
            $table->string('merek')->nullable();
            $table->string('seri')->nullable();
            $table->text('description')->nullable();


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
