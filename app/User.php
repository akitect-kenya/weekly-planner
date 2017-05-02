<?php

namespace Planner;

use Cartalyst\Sentinel\Roles\EloquentRole;
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

    /**
     * Link to the departments a user created.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    /**
     * Link to the departments the user is assigned to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function depAssignment()
    {
        return $this->belongsToMany(Department::class, 'department_user');
    }

    /**
     * Links tot the user's roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(EloquentRole::class, 'role_users', 'user_id', 'role_id');
    }
}
