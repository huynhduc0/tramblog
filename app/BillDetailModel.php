<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetailModel extends Model
{
    //
      protected $table='bill_detail';
   protected $fileTable=['id',	'product_id','bill_id',	'quantity',	'unit_price'];
   public $timestamps = false;
}
