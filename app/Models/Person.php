<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    // Especifica el nombre de la tabla si no es la pluralización por defecto
    protected $table = 'persons';
    use HasFactory;
    protected $fillable = [
        'cedula', 'first_name', 'last_name', 'email', 'phone', 'address', 
        'city_id', 'date_of_birth', 'age', 'gender', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
