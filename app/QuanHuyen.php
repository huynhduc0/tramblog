<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    //
  	protected $table='devvn_quanhuyen';
   protected $fileTable=[	
		'matp',
		'name',
		'type',
		'maqh'];
}
