<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  //instancia de Carbon para formateo de fechas.
	protected $dates = ['published_at'];

	//relacion uno a muchos | $post->category->name
	public function category(){
		return $this->belongsTo(Category::class);
	}
}
