<?php

namespace App;

use App\Position;
use App\Departament;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    //
    protected $guarded = [];

    public function departament()
    {
    	return $this->belongsTo(Departament::class , 'dep_id' , 'id');
    }

    public function position()
    {
    	return $this->belongsTo(Position::class , 'pos_id' , 'id');	
    }
    
}
