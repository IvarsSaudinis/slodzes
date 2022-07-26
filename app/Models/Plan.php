<?php

namespace App\Models;

use App\Scopes\SchoolYearScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plan';

    /**
     * Get plan data
     */
    public function data()
    {
        return $this->hasMany(PlanData::class)->with(['distribution', 'modulename']);
    }

    /**
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new SchoolYearScope());
    }

    /**
     * @return mixed
     */
    public static function getAvailableYears()
    {

        if (\Schema::hasTable('edu_year')) {
             return EduYear::withoutGlobalScope(SchoolYearScope::class)->orderBy('name')->get();
        }
    }
}
