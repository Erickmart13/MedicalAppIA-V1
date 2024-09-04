<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;
    public function schedule()
    {
        return $this->belongsToMany(Schedule::class, 'schedule_day_time', 'day_id', 'schedule_id')
                    ->withPivot('start_time_id', 'end_time_id');
    }
// verificar relaciones
    public function startTime()
    {
        return $this->belongsTo(Time::class, 'start_time_id');
    }

    public function endTime()
    {
        return $this->belongsTo(Time::class, 'end_time_id');
    }
}
