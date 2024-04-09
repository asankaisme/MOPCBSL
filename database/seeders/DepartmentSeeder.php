<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //adds departments details
        Department::create([
            'depName' => 'Economic Research',
        ]);
        Department::create([
            'depName' => 'Public Debt',
        ]);
        Department::create([
            'depName' => 'Statistics',
        ]);
        Department::create([
            'depName' => 'Bank Supervision',
        ]);
        Department::create([
            'depName' => 'Financial Inteligence',
        ]);
        Department::create([
            'depName' => 'Communication',
        ]);
        Department::create([
            'depName' => 'Foreign Exchange',
        ]);
    }
}
