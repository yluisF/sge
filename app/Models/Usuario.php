<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $guarded = [];
	protected $table= 'personas';
	protected $primaryKey = 'id_persona';
	public function getRoutekeyName()
	{
		return 'email';
	}
}
