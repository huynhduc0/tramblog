<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    //
    use FullTextSearch;
    protected $table='posts';
   protected $fileTable=[
			'id',
			'author_id',
			'type_id',
			'title',
			'content',
			'image',
			'comment_count',
			'status',
			'published_at',
			'created_at',
			'updated_at',
			'view_count'
    ];
    protected $searchable = [
        'title',
        'content',
        'image'
    ];
  
    
    }