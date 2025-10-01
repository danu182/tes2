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
        Schema::create('purchase_requisitions', function (Blueprint $table) {
            $table->id();

            $table->string('pr_no')->unique(); 
            $table->bigInteger('sisterCompany_id'); 
            $table->string('title')->nullable(); 
            $table->string('sifat',50); 
            $table->string('jenis',50); 

            $table->text('description')->nullable(); 
            $table->bigInteger('requested_by_user_id');

            $table->bigInteger('status')->default(1);  // draft, pending, approved, rejected
            $table->string('total_amount');

            $table->bigInteger('createded_by_user_id');
            $table->bigInteger('updated_by_user_id')->nullable();


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_requisitions');
    }
};
