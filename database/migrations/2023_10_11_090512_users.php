<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id')->unique();
			$table->string('name')->nullable(false);
			$table->string('email')->unique()->nullable(false);
			$table->string('phone')->nullable(true);
			$table->string('password')->nullable(false);
			$table->timestamps();
			$table->boolean('isAdmin')->default(false);
		});
	}

	public function down(): void {
		Schema::dropIfExists('users');
	}
};
