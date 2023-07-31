<?php

namespace Tests\Feature;

use App\Models\Alias;
use App\Models\Attribute;
use App\Models\Person;
use App\Models\Statistic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_wrong_type_return_page_not_found()
    {
        $person = Person::factory()->create();

        Attribute::factory()->create([
            'person_id' => $person->id
        ]);

        Statistic::factory()->create([
            'person_id' => $person->id
        ]);

        $type = 'test';

        $response = $this->get("/details/{$type}/{$person->id}");

        $response->assertStatus(404);
    }

    public function test_wrong_id_return_page_not_found()
    {
        $person = Person::factory()->create();

        Attribute::factory()->create([
            'person_id' => $person->id
        ]);

        Statistic::factory()->create([
            'person_id' => $person->id
        ]);

        $type = 'pc';
        $id = 'test';

        $response = $this->get("/details/{$type}/{$id}");

        $response->assertStatus(404);
    }

    public function test_view_details_person()
    {
        $person = Person::factory()->specificPerson()->create();

        $alias = Alias::factory()->specificAlias()->create([
            'person_id' => $person->id
        ]);

        $attribute = Attribute::factory()->specificAttribute()->create([
            'person_id' => $person->id
        ]);

        $statistic = Statistic::factory()->specificStatistic()->create([
            'person_id' => $person->id
        ]);

        $type = 'pc';

        $response = $this->get("/details/{$type}/{$person->id}");

        $response->assertSeeText($person->name);
        $response->assertSeeText($alias->name);

        // attributes
        $response->assertSeeText('N/A');
        $response->assertSeeText('Yes');
        $response->assertSeeText('No');

        // statistics
        $response->assertSeeText($statistic->subscriptions);
        $response->assertSeeText($statistic->videos_count);
        $response->assertSeeText($statistic->rank);

        $response->assertStatus(200);
    }

}
