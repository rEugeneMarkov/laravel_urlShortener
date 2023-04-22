<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Helpers\UrlChecker;
use App\Http\Helpers\PageTitleFetcher;
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
        do {
            $url = fake()->url();
            if (UrlChecker::check($url)) {
                $data['link'] = $url;
            }
        } while (!isset($data['link']));

        $data['title'] = PageTitleFetcher::getTitle($data['link']);
        $data['back_halve'] = Str::random(5);
        $data['user_id'] = User::get()->random()->id;

        return $data;
    }
}
