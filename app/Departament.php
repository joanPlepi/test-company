<?php

namespace App;

use App\Worker;
use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    	protected $guarded = [];

    	public function workers()
    	{
    		return $this->hasMany(Worker::class , 'dep_id' , 'id');
    	}
}
