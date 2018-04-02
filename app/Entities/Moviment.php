<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Moviment extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['user_id', 'group_id', 'product_id', 'value', 'type'];


	public function scopeProduct($query, $product){
		return $query->where('product_id', $product->id);
	}

	public function scopeApplications($query){
		return $query->where('type', 1);
	}

	public function scopeOutflows($query){
		return $query->where('type', 2);
	}


    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function group(){
    	return $this->belongsTo(Group::class);
    }

    public function product(){
    	return $this->belongsTo(Product::class);
    }

}
