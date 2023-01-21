<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'paterno', 'materno', 'sexo', 'celular', 'correo'];

    public function informes(){
        return $this->hasMany(Informe::class);
    }
}
