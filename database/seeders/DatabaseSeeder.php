<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Asset;
use Illuminate\Database\Seeder;
use Database\Seeders\AssetSeeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AssetSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(GatepassReasonSeeder::class);
        
        // Asset::factory(28)->create();
    }
}
