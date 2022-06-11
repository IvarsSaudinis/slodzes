<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class TimeWeek extends Model
{
    use HasFactory;

    protected $table = "timetable_week";

    protected $casts = [
        'start' => 'datetime:d.m.y',
    ];

    /**
     * Prepare a date for array
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('d.m.Y');
    }
}
