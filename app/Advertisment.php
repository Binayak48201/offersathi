<?php



namespace App;



use Illuminate\Database\Eloquent\Model;

use App\Brand;

class Advertisment extends Model

{

   protected $guarded = [];



   public function favorites()

   {

        // return $this->morphMany(Favorite::class, 'favorited');

    return $this->belongsToMany(Favorite::class);

}

     /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
     public function getRouteKeyName()
     {
        return 'title';
    }

    public function popular()

    {

        return $this->builder->orderBy('price','desc');

    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class,'advertisments_id')->with('owner');
    }

    /**
     * @return string
     */
    public function path()
    {
        return "/deals/{$this->title}";
    }
}

