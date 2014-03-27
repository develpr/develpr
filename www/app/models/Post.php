<?php

class Post extends \Eloquent {
    protected $fillable = array('title', 'teaser', 'published', 'body');
}