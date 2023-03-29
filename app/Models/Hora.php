<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    protected $table = 'horas';
    protected $primaryKey = 'id_hora';
    protected $fillable = ['hora'];

    public $timestamps = false;

    public function materias() {
        return $this->belongsToMany(Materia::class, 'asignar_horas_dias', 'id_dia', 'id_materia');
    }
}
