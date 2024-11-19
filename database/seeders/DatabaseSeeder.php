<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // `name`, `introductory_title`, `slug`, `price`, `promotion_details`, `number_of_seats`, `color_id`, `description`,

        $arr = [];
        for ($i = 0; $i < 100000; $i++) {
            $arr[] = [
                'name' => fake()->name(),
                'introductory_title' => fake()->name(),
                'slug' => fake()->name(),
                'price' => fake()->randomNumber(),
                'promotion_details' => fake()->name(),
                'number_of_seats' => fake()->randomNumber(),
                'color_id' => fake()->randomNumber(),
                'description' => fake()->name(),
                'status' => fake()->numberBetween(0, 1),
                'image' => fake()->imageUrl(),
            ];

            if ($i % 1000 == 0) {
                Car::insert($arr);
                $arr = [];
            }
        }
    }
}
