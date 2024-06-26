<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Translation;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'link' => 'https://www.youtube.com/embed/0Pgrr23voYs?si=dmuqw6ciDtbV0km3',
            'is_audio_only' => false
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($vt) {
            Translation::create(
                [
                    'translatable_id' => $vt->id,
                    'translatable_type' => Video::class,
                    'locale' =>  App::getLocale(),
                    'data' => [
                        'title' => 'This is the start a good title',
                    ],
                    'created_by' => User::all()->random()->id,
                ]
            );
        });
    }
}
