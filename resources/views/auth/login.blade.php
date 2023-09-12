@extends('layouts.auth')

@section('title', 'Login')

@section('form')
  <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus
        placeholder="email@example.com">
      <div class="invalid-feedback">
        Please fill in your email
      </div>
    </div>

    <div class="form-group">
      <div class="d-block">
        <label for="password" class="control-label">Password</label>
      </div>
      <input id="password" type="password" class="form-control" name="password" tabindex="2" required
        placeholder="Password">
      <div class="invalid-feedback">
        Please fill in your password
      </div>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
        Login
      </button>
    </div>
  </form>
@endsection
