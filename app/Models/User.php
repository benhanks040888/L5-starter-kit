<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Sentinel;

class User extends EloquentUser implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
    * The appended attributes that should be visible in arrays.
    *
    * @var array
    */
    protected $appends = array('full_name');

    public function isAdmin()
    {
        return Sentinel::check() && Sentinel::getUser()->hasAccess('admin');
    }


    /**
    * Accessor for the "full_name" attribute.
    *
    * @return string
    */
    public function getFullNameAttribute()
    {
        return ucwords(trim($this->attributes['first_name'] . ' ' . $this->attributes['last_name']));
    }

}
