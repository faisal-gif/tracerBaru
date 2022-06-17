<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use App\biodata;

class User extends Authenticatable
{
    protected $connection = 'mongodb';
    protected $collection = 'user';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function biodata()
    {
        return $this->belongsTo(biodata::class,'id','nim');
      
    }
}
