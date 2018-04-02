<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Instituition extends Model implements Transformable
{
    use TransformableTrait;

	protected $fillable 	= ['name'];
	public 	  $timestamps 	= true;


	public function groups()
	{
		return $this->hasMany(Group::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}

}
