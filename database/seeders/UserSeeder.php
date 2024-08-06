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
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');
        // Anushka 
        User::factory()->create([
            'name' => 'Nishani EA',
            'email' => 'anushkae@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');
        // Madhusika
        User::factory()->create([
            'name' => 'Madhusika',
            'email' => 'madhusika@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');
        // Asanka
        User::factory()->create([
            'name' => 'Asanka',
            'email' => 'asankacrk@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');

        User::factory()->create([
            'name' => 'helpdeskuser',
            'email' => 'helpdesk@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Viduranga
        User::factory()->create([
            'name' => 'Viduranga',
            'email' => 'vidura@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Gayan
        User::factory()->create([
            'name' => 'Gayan',
            'email' => 'gayan@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Kasturi
        User::factory()->create([
            'name' => 'Kasturi',
            'email' => 'prabash@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Achini
        User::factory()->create([
            'name' => 'Achini',
            'email' => 'achini@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');

        User::factory()->create([
            'name' => 'tecuser',
            'email' => 'tec@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Technical_Officer');
            // sameera and jude
        User::factory()->create([
            'name' => 'Jude',
            'email' => 'sameera.micronet@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Technical_Officer');

        User::factory()->create([
            'name' => 'guest',
            'email' => 'guest@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Guest');

        User::factory()->create([
            'name' => 'apruser',
            'email' => 'approve@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Approving_Officer');

        User::factory()->create([
            'name' => 'SuperAdminUser',
            'email' => 'superadmin@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ]);
    }
}
