<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;
    // Habilitar asignación masiva
    protected $fillable = [
        'user_id',
        'heart_rate',
        'respiratory_rate',
        'blood_pressure',
        'temperature',
        'oxygen_saturation',
        'severity',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
