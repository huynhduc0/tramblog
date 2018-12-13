<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    //
   protected $table='types';
   protected $fileTable=[
			'id',
			'type_name',
      'status'
    ];
   public function posts()
   {
   	return $this->hasMany('App\HomeModel','type_id');
   }
}
