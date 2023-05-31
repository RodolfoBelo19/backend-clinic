<?php

namespace Tests\Feature;

use App\Models\Link;
use App\Models\AccessLogTracker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AccessLogTrackersControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test the index method.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/api/access-log-tracker');

        $response->assertStatus(200);
    }

    /**
     * Test the store method.
     */
    public function test_the_application_stores_a_access_log_tracker(): void
    {
        $link = Link::create([
            'id' => 1,
            'slug' => 'custom-slug',
            'url' => 'https://example.com'
        ]);

        $requestData = [
            'link_id' => $link->id,
            'ip_address' => '123.123.123',
            'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64; rv:85.0) Gecko/20100101 Firefox/85.0',
            'count_access' => 1
        ];

        $response = $this->post('/api/access-log-tracker', $requestData);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'data' => [
                'link_id',
                'ip_address',
                'user_agent',
                'count_access',
                'created_at',
                'updated_at'
            ]
        ]);
    }

    /**
     * Test the show method.
     */
    public function test_the_application_returns_a_access_log_tracker(): void
    {
        $link = Link::create([
            'id' => 1,
            'slug' => 'custom-slug',
            'url' => 'https://example.com'
        ]);

        $accessLogTracker = AccessLogTracker::create([
            'link_id' => $link->id,
            'ip_address' => '123.123.123',
            'user_agent' => 'Mozilla/5.0 (X11; Linux x86_64; rv:85.0) Gecko/20100101 Firefox/85.0',
            'count_access' => 1
        ]);

        $response = $this->get('/api/access-log-tracker/' . $accessLogTracker->id);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'data' => [
                'link_id',
                'ip_address',
                'user_agent',
                'count_access',
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
        $response = $this->get('/api/access-log-tracker/1');

        $response->assertStatus(404);
    }

    /**
     * Test the show method with a non-existent access-log-tracker.
     */
    public function test_the_application_returns_a_not_found_response_with_a_non_existent_access_log_tracker(): void
    {
        $link = Link::create([
            'id' => 1,
            'slug' => 'custom-slug',
            'url' => 'https://example.com'
        ]);

        $response = $this->get('/api/access-log-tracker/' . $link->id);

        $response->assertStatus(404);
    }
}
