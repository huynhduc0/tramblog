<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
	protected $table='products';
	protected $fileTable=[				
				'id',
				'name',
				'BrandID',
				'img',
				'price',
				'count',
				'description',
				'active',
				'rate_count',
				'rate'
				];
	  public $timestamps = false;
    //
}
