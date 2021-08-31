<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sales::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amount = $this->faker->randomNumber(2);
        $unit_price = $this->faker->randomFloat(2, 5, 20);
        return [
            'product_name' => $this->faker->word,
            'unit_price' => $unit_price,
            'discount_percent' => $amount,
            'state' => $this->faker->randomElement(['pending', 'paid']),
            'total_price' => $amount * $unit_price,
            'amount' => $amount,
//            'register_by' => function() {
//                return User::factory()->create()->id;
//            },
            'client_id' => function() {
                return CLient::factory()->create()->id;
            },
        ];
    }
}
