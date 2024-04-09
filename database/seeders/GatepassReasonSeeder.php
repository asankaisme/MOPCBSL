<?php

namespace Database\Seeders;

use App\Models\GatepassReason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GatepassReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reasons will be added via this seeder since reasons are limited to 3 so far.
        GatepassReason::create([
            'reason' => 'This item/ items was/were brought to the bank by an external person',
            'status' => 'A',
        ]);

        GatepassReason::create([
            'reason' => 'This item/ items has/ have to be sent for repairs',
            'status' => 'A',
        ]);

        GatepassReason::create([
            'reason' => 'This item/ items has/ have been sold by the bank',
            'status' => 'A',
        ]);
    }
}
