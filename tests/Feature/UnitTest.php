<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Unit;

class UnitTest extends TestCase
{
  use RefreshDatabase;

  public function test_unit_page_can_be_rendered(): void
    {
      Unit::factory()->count(5)->create();

      $response = $this->get(route('master.unit.index'));
      $response->assertStatus(200);
      $response->assertViewHas('units');
      $unitsInView = $response->viewData('units');

      $this->assertCount(5, $unitsInView);
    }

  public function test_admin_can_create_an_unit(): void
  {
    $data = [
      'name' => 'Test Unit',
    ];

    $response = $this->post(route('master.unit.store'), $data);

    $response->assertStatus(302);
    $response->assertSessionHas('success');
    $response->assertRedirect(route('master.unit.index'));

    $this->assertDatabaseHas('units', $data);
  }
}
