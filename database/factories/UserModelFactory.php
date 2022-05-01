<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserModel;
use Faker\Generator as Faker;

$factory->define(UserModel::class, function (Faker $faker) {
    return [
        
            'firstname'=>$this->faker->firstname,
            'lastname'=>$this->faker->lastname,
            'email'=>$this->faker->email,
            'password'=>$this->faker->password,
            'types'=>$this->faker->types,
            'status'=>$this->faker->status,
    ];
});
