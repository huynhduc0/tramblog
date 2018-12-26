<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    //
    protected $table='bill';
   protected $fileTable=[  'id',	'customer_id',	'date',	'total','status',	'note'];
   public $timestamps = false; 
}
