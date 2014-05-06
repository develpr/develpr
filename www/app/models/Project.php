<?php

/**
 * Project
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $teaser
 * @property string $body
 * @property integer $user_id
 * @property boolean $published
 * @property string $repo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Project published() 
 * @method static \Project random() 
 */
class Project extends \Eloquent {
    protected $fillable = array('title', 'teaser', 'published', 'body', 'repo');

    public function getUrl($relative = true)
    {
        //todo: add relative check
        return Config::get('app.develpr.projectsUrl') . $this->slug;
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