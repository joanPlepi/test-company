<?php

namespace App;

use App\Worker;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    protected $guarded = [];
    
    public function workers()
    {		
    	return $this->hasMany(Worker::class , 'pos_id' , 'id');
    }
}
