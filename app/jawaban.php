<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model ;
use App\biodata;
class jawaban extends Model
{
    protected $connection = 'mongodb';
	protected $collection = 'jawaban';
    protected $guarded = [];

    public function biodata()
    {
        return $this->belongsTo(biodata::class,'email','email');
      
    }

}
