<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XaPhuong extends Model
{
    // 
     protected $table='devvn_xaphuongthitran';
      protected $fileTable=[
      		'xaid',
      		'ten',
      		'type',
      		'maqh'
      ];
}
