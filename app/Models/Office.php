<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'description',
        'location',
        'active',
        
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_specialty');
    }
}
