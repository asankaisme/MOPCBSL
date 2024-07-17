<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //add projector details
        Asset::create([
            'category_id' => Category::where('categoryName', 'Projector')->first()->id,
            'assetName' => 'BenQ PowerBeam',
            'faNo' => 'C20152',
            'serialNo' => 'SJKF4578EYKL789',
        ]);
        Asset::create([
            'category_id' => Category::where('categoryName', 'Projector')->first()->id,
            'assetName' => 'BenQ PowerBeam',
            'faNo' => 'C18256',
            'serialNo' => 'SJKF4578EYKL456',
        ]);
        Asset::create([
            'category_id' => Category::where('categoryName', 'Projector')->first()->id,
            'assetName' => 'BenQ PowerBeam',
            'faNo' => 'C18745',
            'serialNo' => 'SJKF4578EYKL123',
        ]);
    }
}
