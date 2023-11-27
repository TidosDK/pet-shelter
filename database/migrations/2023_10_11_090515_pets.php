<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up(): void {
		Schema::create('pets', function (Blueprint $table) {
			$table->increments('id')->unique();
			$table->string('name')->nullable(false);
			$table->longText('description')->nullable(true)->default(null);
			$table->integer('age_in_months')->nullable(false);
			$table->string('sex')->nullable(false);
			$table->double('price')->nullable(false);
			$table->string('location')->nullable(true)->default(null);
			$table->double('weight')->nullable(false); //Kilograms
			$table->boolean('kidFriendly')->nullable(false);
			$table->boolean('multipleAnimalsFriendly')->nullable(false);
			$table->boolean('castrated')->nullable(false);
			$table->unsignedInteger('users_id')->nullable(false);
			$table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
			$table->unsignedInteger('type_id')->nullable(false);
			$table->foreign('type_id')->references('id')->on('types_of_pets')->onDelete('cascade');
			$table->unsignedInteger('breeds_id')->nullable(true);
			$table->foreign('breeds_id')->references('id')->on('breeds')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down(): void {
		Schema::dropIfExists('pets');
	}
};
