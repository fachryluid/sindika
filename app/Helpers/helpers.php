<?php

if (!function_exists('confirmPassword')) {
  function confirmPassword($password)
  {
    if ($password === 'admin123?') {
      return true;
    }
    return false;
  }
}
