<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [

        'date',
        'hour',
        'list_radio',
        'description',
        'doctor_id',
        'patient_id',
        'specialty_id'
    ];
  

   // Definir la relación con el modelo Specialty
   public function specialty()
   {
       return $this->belongsTo(Specialty::class, 'specialty_id');
   }
   public function patient()
    {
        return $this->belongsTo(Person::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Person::class, 'doctor_id');
    }
}
