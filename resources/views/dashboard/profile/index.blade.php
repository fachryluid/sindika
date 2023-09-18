@extends('layouts.master', [
    'breadcrumbs' => [
        'Dashboard' => route('dashboard.index'),
        'Profil' => '',
    ],
])

@section('title', 'Profil')

@section('main')
  <x-card.form :action="route('profile.update')" title="Profil Saya">
    <x-form.input type="text" name="name" label="Nama" placeholder="Nama Lengkap" :value="$user->name" />
    <x-form.input type="email" name="email" label="Email" placeholder="Alamat Email" :value="$user->email" />
  </x-card.form>
  <x-card.form :action="route('profile.change_password')" title="Ganti Password">
    <x-form.input type="password" name="old_password" label="Password Lama" placeholder="Password Lama" />
    <x-form.input type="password" name="new_password" label="Password Baru" placeholder="Password Baru" />
    <x-form.input type="password" name="repeat_new_password" label="Ulangi Password Baru" placeholder="Ulangi Password Baru" />
  </x-card.form>
@endsection
