<?php

use Illuminate\Support\Facades\Hash;

if (!function_exists('confirmPassword')) {
  function confirmPassword($inputPassword)
  {
    $user = session('user');
    if (Hash::check($inputPassword, $user->password)) {
      return true;
    }
    return false;
  }
}
