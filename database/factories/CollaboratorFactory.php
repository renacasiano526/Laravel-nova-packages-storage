<?php

namespace Database\Factories;

use App\Collaborator;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollaboratorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName().' '.$this->faker->lastName(),
            'url' => $this->faker->url(),
            'description' => implode(' ', $this->faker->sentences(2))."\n\n".implode(' ', $this->faker->sentences(2)),
            'github_username' => $this->faker->slug(),
        ];
    }
}
