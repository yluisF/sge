<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
	protected $guarded = [];
	protected $table= 'afiliados';
protected $primaryKey = 'persona_id';

	public function getRoutekeyName()
	{
		return 'persona_id';
	}
}
