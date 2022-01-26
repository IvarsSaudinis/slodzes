<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class SchoolYearScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        // ja ir aizpidlīts konkrēts sesijas mainīgais, tad automātiski Plans modelim ir papildus scope
        $schoolYear = session('schoolYear', null);

        if ($schoolYear) {
            $builder->where(function ($query) use ($schoolYear) {
                $query->where('year', $schoolYear);
            });
        }
    }
}
