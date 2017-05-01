<?php

namespace Planner;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = [
        'level',
        'class_name',
        'status',
        'class_desc'
    ];
}
