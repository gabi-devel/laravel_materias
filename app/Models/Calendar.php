<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    
    protected $table = 'dias';
    protected $primaryKey = 'id_dia';
    protected $fillable = ['dia', 'orden', 'aniocarrera'];

    public $timestamps = false;

    public function materias() {
        return $this->hasMany(Materia::class, 'id_dia', 'id_dia');
    }

    /* public function materias() {
        return $this->belongsToMany(Materia::class, 'asignar_dias_materias', 'id_dia', 'id_materia');
    } */

    
}
