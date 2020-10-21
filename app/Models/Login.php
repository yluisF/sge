<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    	protected $guarded = [];
	protected $table= 'users';
	protected $primaryKey = 'id';

	public function getRoutekeyName()
	{
		return 'id';
	}
}
