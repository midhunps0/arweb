<?php

namespace Database\Factories;

use App\Models\Translation;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($wpage) {
            $title = $this->faker->sentence(4);
            $slug = Str::slug($title);
            Translation::create(
                [
                    'translatable_id' => $wpage->id,
                    'translatable_type' => Department::class,
                    'locale' =>  App::getLocale(),
                    'slug' =>  $slug,
                    'data' => [
                        'title' => $title,
                        'body' => '[]'
                    ],
                    'created_by' => User::all()->random()->id,
                ]
            );
        });
    }
}
