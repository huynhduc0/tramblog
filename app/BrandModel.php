<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $table='brands_shop';
	protected $fileTable=[					
				'id',
				'brandname',
				];
	 public $timestamps = false;
	 public function posts()
   {
   	return $this->hasMany('App\ShopModel','BrandID');
   }
}
