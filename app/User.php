<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email',
    ];
	
	/**
	 * @var array
	 */
	protected $casts = [
        'confirmed' => 'boolean'
     ];
	
	/**
	 * @return string
	 */
	public function getRouteKeyName()
    {
        return 'name';
    }
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function profile()
    {
        return $this->hasOne(Userprofile::class,'users_id');
        // Ensuring that the users_id is set a the foreign key in userprofile
    }	

}
