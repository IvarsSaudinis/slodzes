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
        return $this->hasMany(PlanData::class);
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
      //  return Plan::withoutGlobalScope(SchoolYearScope::class)->select('year')->distinct()->get()->pluck('year');
    }

}
