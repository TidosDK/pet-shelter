<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLikesPet extends Model {
    use HasFactory;

    protected $table = 'user_likes_pet';

    protected $fillable = [
		'user_id',
		'pet_id',
		'reaction_type'
	];
}
