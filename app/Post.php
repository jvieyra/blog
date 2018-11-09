<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{

	//allow massive assigment
	protected $guarded = [];

	//cambiar el tipo de dato para url
	public function getRouteKeyName(){
		return 'url';
	}

  //instancia de Carbon para formateo de fechas.
	protected $dates = ['published_at'];

	//relacion uno a muchos | $post->category->name
	public function category(){
		return $this->belongsTo(Category::class);
	}

	//relacion muchos a muchos
	public function tags(){
		return $this->belongsToMany(Tag::class);
	}

	public function scopePublished($query){
		$query->whereNotNull('published_at')
									->where('published_at','<=', Carbon::now())
									->latest('published_at');
	}

}
