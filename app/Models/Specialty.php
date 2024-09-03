<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'active',
        
    ];

     // Relación muchos a muchos con User
     public function users()
     {
         return $this->belongsToMany(User::class, 'user_specialty', 'specialty_id', 'user_id');
     }
}
