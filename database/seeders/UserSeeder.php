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
            'bank_id' => 9991,
            'email' => 'itadmin@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');
        // Anushka 
        User::factory()->create([
            'name' => 'Nishani EA',
            'bank_id' => 3238,
            'email' => 'anushkae@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');
        // Madhusika
        User::factory()->create([
            'name' => 'Madhusika',
            'bank_id' => 3272,
            'email' => 'madhusika@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');
        // Asanka
        User::factory()->create([
            'name' => 'Asanka',
            'bank_id' => 3195,
            'email' => 'asankacrk@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');

        User::factory()->create([
            'name' => 'helpdeskuser',
            'bank_id' => 9992,
            'email' => 'helpdesk@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Viduranga
        User::factory()->create([
            'name' => 'Viduranga',
            'bank_id' => 3212,
            'email' => 'vidura@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Gayan
        User::factory()->create([
            'name' => 'Gayan',
            'bank_id' => 3210,
            'email' => 'gayan@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Kasturi
        User::factory()->create([
            'name' => 'Kasturi',
            'bank_id' => 3209,
            'email' => 'prabash@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');
        // Achini
        User::factory()->create([
            'name' => 'Achini',
            'bank_id' => 3214,
            'email' => 'achini@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Helpdesk_Officer');

        User::factory()->create([
            'name' => 'tecuser',
            'bank_id' => 9993,
            'email' => 'tec@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Technical_Officer');
            // sameera and jude
        User::factory()->create([
            'name' => 'Jude',
            'bank_id' => 9994,
            'email' => 'sameera.micronet@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Technical_Officer');

        User::factory()->create([
            'name' => 'guest',
            'bank_id' => 9995,
            'email' => 'guest@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Guest');

        User::factory()->create([
            'name' => 'apruser',
            'bank_id' => 9996,
            'email' => 'approve@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Approving_Officer');

        User::factory()->create([
            'name' => 'SuperAdminUser',
            'bank_id' => 9997,
            'email' => 'superadmin@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ]);
    }
}
