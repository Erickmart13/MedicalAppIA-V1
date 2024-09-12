<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'doctor_id', 'medicine_id', 'description', 'date'];

    // Relación con el paciente
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    // Relación con el médico
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    // Relación con el medicamento
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    // Relación con las enfermedades
    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'prescription_disease');
    }
}
