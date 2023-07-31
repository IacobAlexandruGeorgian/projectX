<?php

namespace Tests\Feature;

use App\Models\Alias;
use App\Models\Person;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_card_with_name()
    {
        $person = Person::factory()->specificPerson()->create();

        $response = $this->get('/');

        $response->assertSeeText($person->name);

        $response->assertStatus(200);
    }

    public function test_view_pagination()
    {
        Person::factory()->count(15)->create();

        $response = $this->get('/');

        //pagination test
        $this->assertInstanceOf(Paginator::class, $response->viewData('people'));

        $response->assertStatus(200);
    }

    public function test_search_not_found()
    {
        $person = Person::factory()->specificPerson()->create();

        $params = [
            'search' => 'Test',
            'type' => 'PC'
        ];

        $response = $this->post('/search', $params);

        $response->assertSeeText('No person was found!');
        $response->assertDontSeeText($person->name);

        $response->assertStatus(200);
    }

    public function test_search_person_found_by_name()
    {
        $person = Person::factory()->specificPerson()->create();

        $secondPerson = Person::factory()->create();

        $params = [
            'search' => $person->name,
            'type' => 'PC'
        ];

        $response = $this->post('/search', $params);

        $response->assertSeeText($person->name);
        $response->assertDontSeeText($secondPerson->name);

        $response->assertStatus(200);
    }

    public function test_search_person_found_by_alias()
    {
        $person = Person::factory()->specificPerson()->create();

        $alias = Alias::factory()->specificAlias()->create([
            'person_id' => $person->id
        ]);

        $secondPerson = Person::factory()->create();

        Alias::factory()->create([
            'person_id' => $secondPerson->id
        ]);

        $params = [
            'search' => $alias->name,
            'type' => 'PC'
        ];

        $response = $this->post('/search', $params);

        $response->assertSeeText($person->name);
        $response->assertDontSeeText($secondPerson->name);

        $response->assertStatus(200);
    }
}
