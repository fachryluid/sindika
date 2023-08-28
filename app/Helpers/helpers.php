<?php

use Illuminate\Support\Facades\Hash;

if (!function_exists('confirmPassword')) {
  function confirmPassword($inputPassword)
  {
    config('app.env') === 'local' ? $password = Hash::make(config('app.admin_password')) : $password = session('user')->password;
    if (Hash::check($inputPassword, $password)) {
      return true;
    }
    return false;
  }
}
