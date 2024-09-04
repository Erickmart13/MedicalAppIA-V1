<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDayTime extends Model
{
    use HasFactory;

    protected $table = 'schedule_day_time';

    public function startTime()
    {
        return $this->belongsTo(Time::class, 'start_time_id');
    }

    public function endTime()
    {
        return $this->belongsTo(Time::class, 'end_time_id');
    }
}
