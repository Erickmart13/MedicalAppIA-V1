<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeAssignment extends Model
{
    use HasFactory;

   

    protected $fillable = ['user_id', 'office_id','specialty_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
