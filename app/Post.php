<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use Sluggable;
	
    protected $fillable = ['title' , 'tags'];

    public  function User(){
    	return $this->belongsTo('App\User');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

     public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
