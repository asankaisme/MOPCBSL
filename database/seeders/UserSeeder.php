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
            'email' => 'itadmin@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');
        // Anushka 
        User::factory()->create([
            'name' => 'Nishani EA',
            'email' => 'anushkae@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');
        // Madhusika
        User::factory()->create([
            'name' => 'Madhusika',
            'email' => 'madhusika@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');
        // Asanka
        User::factory()->create([
            'name' => 'Asanka',
            'email' => 'asankacrk@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');

        User::factory()->create([
            'name' => 'helpdeskuser',
            'email' => 'helpdesk@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Viduranga
        User::factory()->create([
            'name' => 'Viduranga',
            'email' => 'vidura@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Gayan
        User::factory()->create([
            'name' => 'Gayan',
            'email' => 'gayan@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Kasturi
        User::factory()->create([
            'name' => 'Kasturi',
            'email' => 'prabash@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Achini
        User::factory()->create([
            'name' => 'Achini',
            'email' => 'achini@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');

        User::factory()->create([
            'name' => 'tecuser',
            'email' => 'tec@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Technical_Officer');
            // sameera and jude
        User::factory()->create([
            'name' => 'Jude',
            'email' => 'sameera.micronet@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Technical_Officer');

        User::factory()->create([
            'name' => 'guest',
            'email' => 'guest@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Guest');

        User::factory()->create([
            'name' => 'apruser',
            'email' => 'approve@myofficepal',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Approving_Officer');

        User::factory()->create([
            'name' => 'SuperAdminUser',
            'email' => 'superadmin@myofficepal',
            'password' => Hash::make('test@1234'),
        ]);
    }
}
