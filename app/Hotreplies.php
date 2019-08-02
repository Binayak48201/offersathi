<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotreplies extends Model
{
	/**
	 * Don't auto-apply mass assignment protection.
	 *
	 * @var array
	 */
	protected $guarded = [];
	
	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	protected $with = ['owner'];
	
	
	public function owner()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
