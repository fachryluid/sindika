<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Medicine;
use App\Models\User;
use App\Models\Unit;
use App\Models\Type;
use App\Models\Category;

class MedicineTest extends TestCase
{
  public function test_medicine_index_can_be_rendered(): void
  {
    $data = Medicine::factory()->count(5)->create();
    $response = $this->get(route('master.medicine.index'));
    $response->assertStatus(200);
    $response->assertViewHas('medicines');
    $medicinesInView = $response->viewData('medicines');
    $this->assertCount(5, $medicinesInView);
  }

  public function test_medicine_show_can_be_rendered(): void
  {
    $medicine = Medicine::factory()
      ->for(Unit::factory())
      ->for(Type::factory())
      ->for(Category::factory())
      ->create();
    $response = $this->get(route('master.medicine.show', $medicine->uuid));
    $response->assertStatus(200);
    $response->assertViewHas('medicine');
    $medicineInView = $response->viewData('medicine');
  }

  public function test_medicine_can_be_created(): void
  {
    $data = Medicine::factory()->raw();
    $response = $this->post(route('master.medicine.store'), $data);
    $response->assertStatus(302);
    $response->assertSessionHas('success');
    $response->assertRedirect(route('master.medicine.index'));
    $this->assertDatabaseHas('medicines', $data);
  }

  public function test_medicine_can_be_updated(): void
  {
    $medicine = Medicine::factory()->create();
    $data = Medicine::factory()->raw();
    $response = $this->put(route('master.medicine.update', $medicine->uuid), $data);
    $response->assertStatus(302);
    $response->assertSessionHas('success');
    $response->assertRedirect(route('master.medicine.index'));
    $this->assertDatabaseHas('medicines', $data);
    $this->assertDatabaseMissing('medicines', $medicine->toArray());
  }

  public function test_medicine_can_be_deleted(): void
  {
    $user = User::factory()->create();
    session(['user' => $user]);
    $medicine = Medicine::factory()->create();
    $response = $this->delete(route('master.medicine.destroy', $medicine->uuid), ['password' => config('app.admin_password')]);
    $response->assertStatus(302);
    $response->assertSessionHas('success');
    $response->assertRedirect(route('master.medicine.index'));
    $this->assertDatabaseMissing('medicines', $medicine->toArray());
  }
}
