<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'itadminuser',
            'email' => 'itadmin@cbsl.lk',
            'password' => Hash::make('asanka123'),
        ])->assignRole('Admin_Officer');

        User::factory()->create([
            'name' => 'helpdeskuser',
            'email' => 'helpdesk@cbsl.lk',
            'password' => Hash::make('asanka123'),
        ])->assignRole('Helpdesk_Officer');

        User::factory()->create([
            'name' => 'tecuser',
            'email' => 'tec@cbsl.lk',
            'password' => Hash::make('asanka123'),
        ])->assignRole('Technical_Officer');

        User::factory()->create([
            'name' => 'guest',
            'email' => 'guest@cbsl.lk',
            'password' => Hash::make('asanka123'),
        ])->assignRole('Guest');

        User::factory()->create([
            'name' => 'apruser',
            'email' => 'approve@cbsl.lk',
            'password' => Hash::make('asanka123'),
        ])->assignRole('Approving_Officer');

        User::factory()->create([
            'name' => 'SuperAdminUser',
            'email' => 'superadmin@cbsl.lk',
            'password' => Hash::make('asanka123'),
        ]);

    }
}
