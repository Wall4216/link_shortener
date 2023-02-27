<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Service\LinkService;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ShortLinksTest extends TestCase
{

    public function test_example()
    {
        $response = $this->get('/links');

        $response->assertStatus(Response::HTTP_OK);
    }
    public function test_send_form_link_generate()
    {
        $link_key = app(LinkService::class)->getlinkPrefixGenerate();
        $faker = Factory::create('ru_RU');
        $response = $this->from('send')->post('/links', [
           'source_link' => $faker->url,
            'link_key' => $link_key,
            'description' => $faker->description,
        ])->assertRedirect('send')->assertStatus(Response::HTTP_OK);

    }
}
