<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserFactory extends Factory
{

    public function definition()
    {
        return [
            'first_name' => 'EPN-TECH',
            'last_name' => 'EP',
            'personal_phone' => '0998131275',
            'email' => 'epntech01@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Epntech2022'), // password
            'tipo_usuario' => '1',
            'state' => '1',
            'remember_token' => Str::random(10),
        ];
    }


    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}