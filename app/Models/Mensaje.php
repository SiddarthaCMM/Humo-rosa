<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $table = 'mensajes'; // Asegúrate de que el nombre de la tabla sea el correcto

    // Asegúrate de declarar los campos que son rellenables
    protected $fillable = ['nombre', 'apellido', 'email', 'mensaje'];
}