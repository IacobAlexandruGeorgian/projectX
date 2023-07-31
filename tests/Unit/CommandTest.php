<?php

namespace Tests\Unit;

use App\Models\Alias;
use App\Models\Attribute;
use App\Models\Person;
use App\Models\Statistic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_command_get_data()
    {
        $this->artisan('getData:API');

        $peopleCount = Person::count();
        $attributesCount = Attribute::count();
        $statisticsCount = Statistic::count();
        $aliasesCount = Alias::count();

        $this->assertGreaterThan(0, $peopleCount, 'The people Table doesn\'t have records');
        $this->assertGreaterThan(0, $attributesCount, 'The attributes Table doesn\'t have records');
        $this->assertGreaterThan(0, $statisticsCount, 'The statistics Table doesn\'t have records');
        $this->assertGreaterThan(0, $aliasesCount, 'The aliases Table doesn\'t have records');

        $person = Person::all()->first();

        $this->assertDatabaseHas('people', ['id' => $person->id]);
        $this->assertDatabaseHas('attributes', ['person_id' => $person->id]);
        $this->assertDatabaseHas('statistics', ['person_id' => $person->id]);

        $this->assertTrue(Cache::has('image_' . $person->id . '_pc'));
    }
}
