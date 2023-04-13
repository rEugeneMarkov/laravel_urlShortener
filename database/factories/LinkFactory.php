<?php

namespace Database\Factories;

use App\Http\Services\LinkService;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data['link'] = fake()->url();

        $data['title'] = LinkService::getTitle($data['link']);

        $data['back_halve'] = Str::random(5);
        $data['user_id'] = User::get()->random()->id;

        return $data;
    }
}
