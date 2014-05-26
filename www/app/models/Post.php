<?php

/**
 * Post
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $teaser
 * @property string $body
 * @property integer $user_id
 * @property boolean $published
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Post published() 
 * @method static \Post random() 
 */
class Post extends \Eloquent {
    protected $fillable = array('title', 'teaser', 'published', 'body');

    public function getUrl($relative = true)
    {
        return Config::get('app.develpr.postsUrl') . $this->slug;
    }

    public function scopePublished($query)
    {
        return $query->where('published', '=', 1);
    }

    public function scopeRandom($query)
    {
        return $query->orderBy(DB::raw('RAND()'));
    }
}