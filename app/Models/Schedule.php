<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'schedule_assignment', 'schedule_id', 'user_id');
    }
    public function daysTimes()
    {
        return $this->belongsToMany(Day::class, 'schedule_day_times', 'schedule_id', 'day_id')
            ->withPivot('start_time_id', 'end_time_id');
    }
}
