<?php
namespace App;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
use App\Task;
class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

      /**
       * @return \Illuminate\Database\Eloquent\Relations\HasOne
       */
      public function profiles()
    {
        return $this->hasOne(Adminprofile::class,'admin_id');
    }

      /**
       * @return string
       */
      public function path()
    {
        return "/admin/admin_profile/{$this->id}";
        // return "/threads/{$this->channel->slug}/{$this->id}";
    }

      /**
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function taskes()
    {
       return $this->hasMany(Task::class,'user_id');
    }

      /**
       * @return string
       */
      public function getRouteKeyName()
    {
        return 'name';
    } 

}