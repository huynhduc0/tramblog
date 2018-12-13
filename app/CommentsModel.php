<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    //
   protected $table='comments';
   protected $fileTable=[
		'id',
		'author_id',
		'post_id',
		'content',
		'reply_id',
		'created_at'
    ];
}
