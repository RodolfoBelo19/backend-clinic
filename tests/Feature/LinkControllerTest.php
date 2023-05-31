<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class LinkControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test the index method.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/api/link');

        $response->assertStatus(200);
    }

    /**
     * Test the store method.
     */
    public function test_the_application_stores_a_link(): void
    {
        Http::fake([
            'https://api.encurtador.dev/encurtamentos' => Http::response([
                'urlEncurtada' => 'https://shortened-url.com'
            ], 200)
        ]);

        $requestData = [
            'url' => 'https://example.com',
            'slug' => 'custom-slug'
        ];

        $response = $this->post('/api/link', $requestData);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'link',
            'status',
            'data' => [
                'slug',
                'url',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    /**
     * Test the show method.
     */
    public function test_the_application_returns_a_link(): void
    {
        $link = Link::create([
            'slug' => 'custom-slug',
            'url' => 'https://example.com'
        ]);

        $response = $this->get('/api/link/' . $link->id);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'data' => [
                'slug',
                'url',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    /**
     * Test the show method with a non-existent link.
     */
    public function test_the_application_returns_a_not_found_response(): void
    {
        $response = $this->get('/api/link/1');

        $response->assertStatus(404);
    }

    /**
     * Test the update method.
     */
    public function test_the_application_updates_a_link(): void
    {
        $link = Link::create([
            'slug' => 'custom-slug',
            'url' => 'https://example.com'
        ]);

        $requestData = [
            'url' => 'https://example.com',
            'slug' => 'custom-slug'
        ];

        $response = $this->patch('/api/link/' . $link->id, $requestData);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'data' => [
                'slug',
                'url',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    /**
     * Test the delete method.
     */
    public function test_the_application_deletes_a_link(): void
    {
        $link = Link::create([
            'slug' => 'custom-slug',
            'url' => 'https://example.com'
        ]);

        $response = $this->delete('/api/link/' . $link->id);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'message'
        ]);
    }

}
