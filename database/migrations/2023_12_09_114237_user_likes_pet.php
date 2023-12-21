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
        Schema::create('user_likes_pet', function (Blueprint $table) {
            $table->id();
			$table->unsignedInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			
            $table->unsignedInteger('pet_id')->nullable(false);
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            
            $table->unsignedInteger('type_id')->nullable(false);
            $table->foreign('type_id')->references('id')->on('types_of_likes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_likes_pet');
    }
};
