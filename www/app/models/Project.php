<?php

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