<?php

namespace Planner;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $fillable = [
        'orgName',
        'active'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
