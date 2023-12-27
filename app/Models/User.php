<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
	use HasFactory;

	protected $fillable = [
		'name',
		'email',
		'password',
		'phone',
		'isAdmin'
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function pets() {
		if($this->isAdmin){
			return $this->hasMany(Pets::class);
		}
		return $this->hasMany(Pets::class, 'users_id');
	}
}
