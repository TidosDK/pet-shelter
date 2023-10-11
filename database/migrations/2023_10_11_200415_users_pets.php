<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void {
		Schema::create('users_pets', function (Blueprint $table) {
			$table->increments('id')->unique();
			$table->unsignedInteger('users_id')->nullable(false);
			$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
			$table->unsignedInteger('pets_id')->nullable(false);
			$table->foreign('pets_id')->references('id')->on('pets')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down(): void {
		Schema::dropIfExists('users_pets');
	}
};
