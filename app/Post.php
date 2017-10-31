<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
	public function author(){
		return $this->belongsTo(User::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	
	public function getImageUrlAttribute(){
		$imageUrl = "";
		if(!is_null($this->image)){
			$imagePath = public_path()."/img/".$this->image;
			if(file_exists($imagePath)){
		    	$imageUrl = asset("img/".$this->image);
			}
		}
		return $imageUrl;
	}

	public function getDateAttribute()
	{
		return $this->created_at->diffForHumans();
	}

	public function scopeLatestFirst($query)
	{
		return $query->orderBy('created_at', 'desc');
	}

	public function scopePublished($query)
	{
		return $query->where('published_at', "<=", Carbon::now());
	}
}
