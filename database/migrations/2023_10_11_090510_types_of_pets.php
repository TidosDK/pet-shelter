<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void {
		Schema::create('types_of_pets', function (Blueprint $table) {
			$table->increments('id')->unique();
			$table->string('type')->nullable(false);
			$table->timestamps();
		});
	}

	public function down(): void {
		Schema::dropIfExists('types_of_pets');
	}
};
