<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $guarded = [];
	protected $table= 'municipios';
	protected $primaryKey = 'id_municipio';
}
