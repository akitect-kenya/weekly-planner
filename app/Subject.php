<?php

namespace Planner;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'subj_desc', 'status'];
}
