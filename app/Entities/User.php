<?php

namespace App\Entities;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    #use SoftDeletes;
    use Notifiable;

    /**
     * ========================================================================== *
     * The ORM databse attributes
     * ========================================================================== *
     */
    public    $timestamps   = true;
    protected $table        = 'users';
    protected $fillable     = ['cpf', 'name', 'phone', 'birth', 'gender', 'notes', 'email', 'password', 'status', 'permission'];
    protected $hidden       = ['password', 'remember_token'];


    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups');
	}
	
	public function moviments(){
		return $this->hasMany(Moviment::class);
	}



	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
	}


	public function getFormattedCpfAttribute()
	{
		$cpf = $this->attributes['cpf'];
		return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 7, 3) . '-' . substr($cpf, -2);
	}

	public function getFormattedPhoneAttribute()
	{
		$phone = $this->attributes['phone'];
		return "(" . substr($phone, 0, 2) . ") " . substr($phone, 2, 4) . "-" . substr($phone, -4);
	}

	public function getFormattedBirthAttribute()
	{
		$birth = explode('-', $this->attributes['birth']);
		
		if(count( (array) $birth) != 3)
			return "";

		$birth = $birth[2] . '/' . $birth[1] . '/' . $birth[0];
		return $birth;
	}

}
