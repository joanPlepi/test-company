<?php

use Faker\Generator as Faker;

$factory->define(App\Worker::class, function (Faker $faker) {
    return [
        //
    	'name' => $faker->firstName , 
    	'dep_id' => App\Departament::all()->random()->id ,
    	'pos_id' => App\Position::all()->random()->id
    ];
});
