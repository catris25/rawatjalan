<?php

namespace App;

use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract,HasRoleAndPermissionContract
{
    use Authenticatable, Authorizable, CanResetPassword, HasRoleAndPermission;

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
    protected $fillable = ['email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    // public function role()
    // {
    //     return $this->belongsToMany('App\Role','role_user','user_id','role_id');
    // }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function admin() {
        return $this->belongsTo('App\Admin','email','email');
    }

    // public function getId() {
    //   return $this->email;
    // }

    // public function dokter() {
    //     return $this->belongsTo('App\Dokter','email','email');
    // }

}
