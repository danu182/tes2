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
        Schema::create('purchase_requisitions_details', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('pr_id');
            $table->bigInteger('item_id');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('total_price');
            $table->text('description')->nullable();

            
            $table->bigInteger('requested_by_user_id');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_requisitions_details');
    }
};
