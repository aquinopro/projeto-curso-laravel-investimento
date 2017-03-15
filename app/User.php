<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * ========================================================================== *
     * The ORM databse attributes
     * ========================================================================== *
     */
    public    $timestamps   = true;
    protected $table        = 'users';
    protected $fillable     = ['name', 'email', 'password'];
    protected $hidden       = ['password', 'remember_token'];
}
