<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable {
	use HasFactory;

	public function pets() {
		return $this->hasMany(Pets::class, 'users_id');
	}
}
