<?php

namespace Planner;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable = ['name', 'roles', 'org_id', 'user_id'];

    public function organisation()
    {
        // return $this->belongsTo(Organization::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

}
