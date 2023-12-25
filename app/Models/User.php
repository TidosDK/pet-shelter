<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable {
	use HasFactory, TwoFactorAuthenticatable;

	protected $fillable = [
		'name',
		'email',
		'password',
		'phone',
	];

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function pets() {
		return $this->hasMany(Pets::class, 'users_id');
	}
}
