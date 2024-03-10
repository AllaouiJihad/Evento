<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Ticket::class;


    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 10, 100), // Prix aléatoire entre 10 et 100
            'places_nbr' => $this->faker->numberBetween(1, 100), // Nombre de places aléatoire entre 1 et 100
            'event_id' =>  \App\Models\Event::inRandomOrder()->first()->id,
        ];

    }
}
