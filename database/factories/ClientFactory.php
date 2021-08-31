<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::where('email', 'example@example.com')->first();
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->lastname(),
            'dni' => Str::random(8),
            'email' => $this->faker->unique()->safeEmail(),
            'birth_date' => $this->faker->date($format = 'Y-m-d', $max = '-15 years'),
//            'register_by' => $user->id,
        ];
    }
}
