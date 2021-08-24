<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanData extends Model
{
    use HasFactory;

    protected $table = 'plan_data';

    public function modulename()
    {
        return $this->belongsTo(Modules::class, 'module_id', 'id');
    }

    public function distribution()
    {
        return $this->hasMany(PlanDistribution::class, 'plan_data_id', 'id');
    }



}
