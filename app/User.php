<?php

namespace Planner;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'IDTypeID',
        'password',
        'userName',
        'emailAddress',
        'surName',
        'otherNames',
        'idNumber',
        'refNumber',
        'msisdn',
        'passwordStatus',
        'datePasswordChanged',
        'passwordAttempts',
        'last_login',
        'lastLoginIP',
        'active',
        'userNameArchived',
        'dateActivated',
        'MSISDNArchived',
        'passwordCanExpire',
        'canAccessUI',
        'apiKey',
        'question',
        'answer',
        'org_id',
        'session_id',
        'updatedBy',
        'archivedBy',
        'dateLastReminded',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
