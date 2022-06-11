<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modules extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'theory',
        'practice'
    ];

    protected $table = 'modules';

    public function type()
    {
        return $this->hasOne(ModuleType::class, 'id', 'modules_type_id');
    }
}
