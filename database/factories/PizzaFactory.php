<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizza>
 */
class PizzaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $toppings = [
            'Pepperoni',
            'Pinia',
            'Chicken',
            'Sausege',
            'Extra Chesse',
            'Black Olives'
        ];

        $toppingsSelected = [];

        for ($i = 1; $i <= rand(1, 4); $i++) {
            $toppingsSelected[] = Arr::random($toppings);
        }

        $toppingsSelected = array_unique($toppingsSelected);

        return [
            'user_id' => rand(1, 10),
            'size' => Arr::random(['Small', 'Medium', 'Large', 'Extra Large']),
            'crust' => Arr::random(['Nomral', 'Thin', 'Garlic']),
            'toppings' => $toppingsSelected,
            'status' => Arr::random(['Ordered', 'Prepping', 'Baking', 'Checking', 'Ready']),

        ];
    }
}
