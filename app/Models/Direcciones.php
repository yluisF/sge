<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $guarded = [];
	protected $table= 'direcciones';
	protected $primaryKey = 'id_direccion';

	public function getRoutekeyName()
	{
		return 'persona_id';
	}
}
