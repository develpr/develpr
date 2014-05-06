<?php namespace Develpr;

/**
 * Develpr\Redirect
 *
 * @property integer $id
 * @property string $type
 * @property string $source
 * @property integer $resource_id
 * @property string $destination
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Redirect extends \Eloquent {
	protected $fillable = array();
}