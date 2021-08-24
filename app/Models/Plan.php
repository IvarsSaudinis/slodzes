<?php

namespace App\Models;

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



}
