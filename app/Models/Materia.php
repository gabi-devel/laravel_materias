<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';
    protected $primaryKey = 'id_materia';
    protected $fillable = ['id_user', 'nombre', 'descripcion', 'id_dia'];

    public $timestamps = false;

    public function dia() {
        return $this->belongsTo(Calendar::class, 'id_dia', 'id_dia');
    }

    public function tareas() {
        return $this->hasMany(Tarea::class, 'id_materia', 'id_materia');
    }

    /* public function dias() {
        return $this->belongsToMany(Calendar::class, 'asignar_materias_dias', 'id_materia', 'id_dia');
    } */

    /* public function horas() {
        return $this->belongsToMany(Hora::class, 'asignar_horas_dias', 'id_materia', 'id_hora');
    } */
    /* public function usuario() {
        return $this->belongsTo(User::class, 'id_user', 'id_materia');
    } */
}
