<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\Translation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($vt) {
            Translation::create(
                [
                    'translatable_id' => $vt->id,
                    'translatable_type' => Photo::class,
                    'locale' =>  App::getLocale(),
                    'data' => [
                        'title' => 'This is a good title',
                    ],
                    'created_by' => User::all()->random()->id,
                ]
            );
        });
    }
}
