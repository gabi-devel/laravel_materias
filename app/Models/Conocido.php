<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conocido extends Model
{
    use HasFactory;

    protected $table = 'conocido';
    protected $primaryKey = 'id_con';
    protected $fillable = ['descripcion'];

    public $timestamps = false;
}
