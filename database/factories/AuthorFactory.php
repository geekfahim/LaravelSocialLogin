<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    protected $model = Author::class;

    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'email'=>$this->faker->unique()->safeEmail,
            'phone'=>$this->faker->unique()->numerify('016########'),
            'address'=>$this->faker->address,
        ];
    }
}
