<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            '자동차 이미지'=> $this->faker->imageUrl(320, 240, 'cats'),
            '제조회사' => $this->faker->word(),
            '자동차명' => $this->faker->word(),
            '제조년도' => 2021,
            '가격' => 3500,
            '차종' => $this->faker->word(),
            '외형' => $this->faker->word(),
        ];
    }
}
