<?php

namespace Tests\Feature;

use App\Models\City;
use App\Models\Neighbourhood;
use App\Models\State;
use App\Models\User;
use Database\Seeders\ServiceAreaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ServiceAreaManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_static_service_area_data_is_seeded_and_visible_publicly(): void
    {
        $this->seed(ServiceAreaSeeder::class);
        $state = State::where('slug', 'california')->firstOrFail();
        $city = City::where('slug', 'los-angeles')->firstOrFail();
        $area = Neighbourhood::where('slug', 'hollywood')->firstOrFail();

        $this->get(route('website.serviceArea'))->assertOk()->assertSee('California');
        $this->get(route('website.state', ['state' => $state]))->assertOk()->assertSee('Los Angeles');
        $this->get(route('website.city', ['state' => $state, 'city' => $city]))->assertOk()->assertSee('Atwater Village');
        $this->get(route('website.detail', ['state' => $state, 'city' => $city, 'neighbourhood' => $area]))->assertOk()->assertSee('Tour Itinerary');
        $this->assertSame('/service-area/california/los-angeles/hollywood', route('website.detail', [$state, $city, $area], false));
    }

    public function test_admin_can_manage_related_service_area_records(): void
    {
        $admin = User::factory()->create(['role' => User::ROLE_ADMIN]);
        $state = State::create(['name' => 'Test State', 'slug' => 'test-state']);
        $city = City::create(['state_id' => $state->id, 'name' => 'Test City', 'slug' => 'test-city']);

        $this->actingAs($admin)->post(route('neighbourhoods.store'), [
            'state_id' => $state->id, 'city_id' => $city->id, 'name' => 'Test Area', 'slug' => 'test-area',
            'days' => 4, 'nights' => 3, 'price' => 199, 'status' => 1,
            'tour_plan' => [['title' => 'Day 1', 'description' => 'Arrival and check-in']],
            'highlights' => ['Guided tour'], 'inclusions' => ['Hotel'], 'exclusions' => ['Flights'],
        ])->assertRedirect(route('neighbourhoods.index'));

        $this->assertDatabaseHas('neighbourhoods', ['city_id' => $city->id, 'slug' => 'test-area']);
        $area = Neighbourhood::where('slug', 'test-area')->firstOrFail();
        $this->assertSame('Day 1', $area->tour_plan[0]['title']);
        $this->assertSame(['Guided tour'], $area->highlights);
    }

    public function test_author_cannot_access_service_area_management(): void
    {
        $author = User::factory()->create(['role' => User::ROLE_AUTHOR]);
        $this->actingAs($author)->get(route('states.index'))->assertForbidden();
    }

    public function test_admin_can_upload_and_delete_a_neighbourhood_image(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['role' => User::ROLE_ADMIN]);
        $state = State::create(['name' => 'Image State', 'slug' => 'image-state']);
        $city = City::create(['state_id' => $state->id, 'name' => 'Image City', 'slug' => 'image-city']);

        $this->actingAs($admin)->post(route('neighbourhoods.store'), [
            'state_id' => $state->id, 'city_id' => $city->id, 'name' => 'Image Area', 'slug' => 'image-area',
            'days' => 4, 'nights' => 3, 'price' => 199, 'status' => 1,
            'main_image' => UploadedFile::fake()->image('area.jpg'),
        ])->assertRedirect(route('neighbourhoods.index'));

        $area = Neighbourhood::where('slug', 'image-area')->firstOrFail();
        Storage::disk('public')->assertExists($area->main_image);

        $this->actingAs($admin)->deleteJson(route('neighbourhoods.images.destroy', [$area, 'main_image']))
            ->assertOk();
        Storage::disk('public')->assertMissing($area->main_image);
        $this->assertNull($area->fresh()->main_image);
    }
}
