<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Database\Eloquent\Casts\Attribute;

class EduWeek extends Model
{
    use HasFactory;

    protected $table = "edu_week";

    protected $casts = [
        'start_date' => 'datetime:d.m.y',
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

     /**
      * Get calendar week number from edu_week.start_date value
      *
      * @return  \Illuminate\Database\Eloquent\Casts\Attribute
      */
    protected function calendarWeekNumberSimple(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($this->start_date)->weekOfYear,
        );
    }

    /**
     * Get calendar week number from edu_week.start_date value
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function calendarWeekNumber(): Attribute
    {
        return Attribute::make(
            get: function ($value) {

                $date = Carbon::parse($this->start_date);

                if($date->weekday()==0)
                {
                    return $date->weekOfYear;
                }

                return $date->weekOfYear . " - " . $date->addWeek()->weekOfYear;
            }
        );
    }


    /**
     * Get week type name from edu_week_type.name
     */
    public function week_type()
    {
        return $this->hasOne(EduWeekType::class, 'id', 'edu_week_type_id');
    }

    /**
     * Get year  from edu_year table
     */
    public function year()
    {
        return $this->hasOne(EduYear::class, 'id', 'edu_year_id');
    }

}
