<?php


namespace StanDev\Laraplate\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\Factories\UserFactory as TestbenchUserFactory;
use StanDev\Laraplate\Models\User;

class UserFactory extends TestbenchUserFactory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => \Illuminate\Support\Str::random(10),
        ];
    }
}
