<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';
    protected $primaryKey = 'id_tarea';
    protected $fillable = ['titulo', 'descripcion', 'entrega', 'id_materia'];

    /* public $timestamps = true; */

    public function materia() {
        return $this->belongsTo(Materia::class, 'id_materia', 'id_materia');
    }
}
