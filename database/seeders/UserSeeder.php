<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Apoteker',
            'email' => 'apoteker@sindika.test',
            'role' => 'APOTEKER',
            'password' => Hash::make('apotekersindika')
        ]);

        User::create([
            'name' => 'Operator',
            'email' => 'operator@sindika.test',
            'role' => 'OPERATOR',
            'password' => Hash::make('operatorsindika')
        ]);

        User::create([
            'name' => 'Manajer',
            'email' => 'manajer@sindika.test',
            'role' => 'MANAJER',
            'password' => Hash::make('manajersindika')
        ]);
    }
}
