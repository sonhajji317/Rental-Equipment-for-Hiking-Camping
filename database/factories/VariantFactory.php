<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $product = Product::inRandomOrder()->first();

        // $size = null;
        // $color = null;
        // $capacity = null;

        // //logic cateogry product
        // switch ($product->category->name) {
        //     case 'Sepatu':
        //         $size = $this->faker->randomElement(['38', '39', '40', '41', '42', '43']);
        //         $color = $this->faker->randomElement(['black', 'white', 'army']);
        //         break;

        //     case 'Jaket':
        //         $size = $this->faker->randomElement(['s', 'm', 'l', 'xl', 'xxl']);
        //         $color = $this->faker->randomElement(['black', 'white', 'army']);
        //         break;

        //     case 'Tas':
        //         $capacity = $this->faker->randomElement(['20l', '30l', '40l', '50l', '60l']);
        //         $color = $this->faker->randomElement(['black', 'white', 'army']);
        //         break;

        //     case 'Sleeping bag':
        //         $color = $this->faker->randomElement(['black', 'white', 'army']);
        //         break;

        //     case 'Flysheet':
        //         $size = $this->faker->randomElement(['1x1', '1x2', '2x2', '2x3', '3x3']);
        //         $color = $this->faker->randomElement(['black', 'white', 'army']);
        //         break;

        //     case 'Topi':
        //         $color = $this->faker->randomElement(['black', 'white', 'army']);
        //         break;

        //     case 'Tenda':
        //         $size = $this->faker->randomElement(['2', '3', '4', '6', '8']);
        //         $color = $this->faker->randomElement(['black', 'white', 'army']);
        //         break;

        //     default:
        //         break;
        // }


        return [
            // 'product_id' => $product->id,
            // 'size' => $size,
            // 'color' => $color,
            // 'capacity' => $capacity,
            // 'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
