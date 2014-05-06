<?php

/**
 * Configuration
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $key
 * @property string $value
 * @property boolean $visible
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Configuration extends \Eloquent {
	protected $fillable = array();

}