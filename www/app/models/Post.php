<?php

class Post extends \Eloquent {
    protected $fillable = array('title', 'teaser', 'published', 'body');

    public function scopePublished($query)
    {
        return $query->where('published', '=', 1);
    }

    public function scopeRandom($query)
    {
        return $query->orderBy(DB::raw('RAND()'));
    }
}