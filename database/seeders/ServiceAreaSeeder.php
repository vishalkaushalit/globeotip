<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Neighbourhood;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceAreaSeeder extends Seeder
{
    public function run(): void
    {
        $states = ['California', 'New York', 'Texas', 'Florida', 'Illinois', 'Pennsylvania', 'Ohio', 'Georgia', 'North Carolina', 'Michigan'];
        foreach ($states as $name) State::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name]);

        $state = State::where('slug', 'california')->firstOrFail();
        $cities = ['Los Angeles', 'San Diego', 'San Jose', 'San Francisco', 'Fresno', 'Sacramento', 'Long Beach', 'Oakland', 'Bakersfield'];
        foreach ($cities as $name) City::firstOrCreate(['state_id' => $state->id, 'slug' => Str::slug($name)], ['name' => $name]);

        $city = City::where('state_id', $state->id)->where('slug', 'los-angeles')->firstOrFail();
        $names = ['Hollywood', 'Westlake', 'Van Nuys', 'North Hollywood', 'Pacoima', 'Koreatown', 'Boyle Heights', 'Canoga Park', 'Northridge', 'South Los Angeles', 'Reseda', 'West Adams', 'Sun Valley', 'Sylmar', 'Panorama City', 'San Pedro', 'Wilmington', 'Westchester', 'Venice', 'Echo Park', 'Highland Park', 'Harbor Gateway', 'Sherman Oaks', 'Encino', 'Westwood', 'Baldwin Hills / Crenshaw', 'Brentwood', 'Eagle Rock', 'Palms', 'Woodland Hills', 'Chatsworth', 'Tarzana', 'Mar Vista', 'Los Feliz', 'Mid-Wilshire', 'Bel Air', 'Studio City', 'Silver Lake', 'Glassell Park', 'Atwater Village', 'Porter Ranch', 'Valley Village', 'Granada Hills', 'Mission Hills', 'Lincoln Heights', 'El Sereno', 'Jefferson Park', 'Leimert Park', 'Cypress Park', 'Toluca Lake'];
        foreach ($names as $name) {
            Neighbourhood::firstOrCreate(['city_id' => $city->id, 'slug' => Str::slug($name)], [
                'state_id' => $state->id, 'name' => $name, 'summary' => "Discover amazing places in {$name}.",
                'description' => "Experience the ultimate comfort and excitement in {$name}. This exclusive package offers top-tier accommodations, immersive local tours, and a chance to truly experience the culture of Los Angeles.",
                'overview' => "{$name} in Los Angeles, California, is a vibrant destination blending local character with modern attractions.",
                'tour_plan' => [['title' => 'Day 1: Arrival & Check-In', 'description' => "Arrive in Los Angeles and check in at {$name}."], ['title' => 'Day 2: City Exploration', 'description' => "Enjoy a guided tour of {$name}."], ['title' => 'Day 3: Leisure & Departure', 'description' => 'Enjoy breakfast and depart at your leisure.']],
                'highlights' => ['3 Nights Accommodation in a 4-Star Hotel', 'Daily Complimentary Breakfast', "Guided Walking Tour of {$name}", 'Airport Transfers Included'],
                'inclusions' => ['Hotel stay for 3 nights', 'All local taxes and fees', 'Sightseeing tours as mentioned', '24/7 on-ground assistance'],
                'exclusions' => ['International/Domestic Flights', 'Personal expenses', 'Meals not explicitly mentioned', 'Travel Insurance'],
            ]);
        }
    }
}
