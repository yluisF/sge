<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    protected $guarded = [];
	protected $table= 'colonia';
	protected $primaryKey = 'id_colonia';
}
