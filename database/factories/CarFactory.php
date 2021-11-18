<?php

namespace Database\Factories;

use App\Models\Company;
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
        $c = new Company();
        $c -> name = 'Hyundai';
        $c -> save();
        
        return [
            'image'=> $this->faker->name(),
            'name'=> $this->faker->name(),
            'company_id'=> $c->id,
            'price'=> 3000,
            'year'=> 2021,
            'type'=> '세단',
            'style'=> 'SUV',
        ];
    }
}
