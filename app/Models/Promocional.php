<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocional extends Model
{
    use HasFactory;

    protected $table = 'promocionales';
    protected $primaryKey = 'id_prom';
    protected $fillable = ['descripcion'];

    public $timestamps = false;
}
