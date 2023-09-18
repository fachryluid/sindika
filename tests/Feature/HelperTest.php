<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class HelperTest extends TestCase
{
  public function test_confirm_password_success(): void
  {
      $password = config('app.admin_password');
      $hashedPassword = Hash::make($password);

      session(['user' => (object) ['password' => $hashedPassword]]);

      $this->assertTrue(confirmPassword($password));
  }

  public function test_confirm_password_failure(): void
  {
      $password = config('app.admin_password');
      $incorrectPassword = 'incorrect_password';
      $hashedPassword = Hash::make($password);

      session(['user' => (object) ['password' => $hashedPassword]]);

      $this->assertFalse(confirmPassword($incorrectPassword));
  }
}
