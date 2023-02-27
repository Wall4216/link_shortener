<?php

namespace Database\Factories;

use App\Models\Link;
use App\Service\LinkService;
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
    protected $todel = Link::class;
    public function definition()
    {
        return [
            'source_link' => $this->faker->url,
            'link_key' => app(LinkService::class)->getlinkPrefixGenerate(),
            'description' => $this->faker->text(40),
        ];
    }
}
