<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Unit;
use App\Models\Medicine;
use App\Models\User;

class UnitTest extends TestCase
{
  use RefreshDatabase;

  public function test_unit_index_can_be_rendered(): void
  {
    Unit::factory()->count(5)->create();
    $response = $this->get(route('master.unit.index'));
    $response->assertStatus(200);
    $response->assertViewHas('units');
    $unitsInView = $response->viewData('units');
    $this->assertCount(5, $unitsInView);
  }

  public function test_unit_show_can_be_rendered(): void
  {
    $unit = Unit::factory()->has(Medicine::factory()->count(5))->create();
    $response = $this->get(route('master.unit.show', $unit->uuid));
    $response->assertStatus(200);
    $response->assertViewHas('unit');
    $unitInView = $response->viewData('unit');
    $this->assertCount(5, $unitInView->medicines);
  }

  public function test_unit_can_be_created(): void
  {
    $data = Unit::factory()->raw();
    $response = $this->post(route('master.unit.store'), $data);
    $response->assertStatus(302);
    $response->assertSessionHas('success');
    $response->assertRedirect(route('master.unit.index'));
    $this->assertDatabaseHas('units', $data);
  }

  public function test_unit_can_be_updated(): void
  {
    $unit = Unit::factory()->create();
    $data = Unit::factory()->raw();
    $response = $this->put(route('master.unit.update', $unit->uuid), $data);
    $response->assertStatus(302);
    $response->assertSessionHas('success');
    $response->assertRedirect(route('master.unit.index'));
    $this->assertDatabaseHas('units', $data);
    $this->assertDatabaseMissing('units', $unit->toArray());
  }

  public function test_unit_can_be_deleted(): void
  {
    $user = User::factory()->create();
    session(['user' => $user]);
    $unit = Unit::factory()->create();
    $response = $this->delete(route('master.unit.destroy', $unit->uuid), ['password' => config('app.admin_password')]);
    $response->assertStatus(302);
    $response->assertSessionHas('success');
    $response->assertRedirect(route('master.unit.index'));
    $this->assertDatabaseMissing('units', $unit->toArray());
  }
}
