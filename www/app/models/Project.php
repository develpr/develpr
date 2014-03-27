<?php

class Project extends \Eloquent {
    protected $fillable = array('title', 'teaser', 'published', 'body', 'repo');
}