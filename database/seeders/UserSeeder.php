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
        $users = [
            ['name' => 'H M P B Herath', 'bank_id' =>    1852, 'email' => 'herath@cbsl.lk'],
            ['name' => 'C. C. Gamage', 'bank_id' =>    1772, 'email' => 'chaturagamage@cbsl.lk'],
            ['name' => 'H.S. Wickramasuriya', 'bank_id' =>    1720, 'email' => 'sulochane@cbsl.lk'],
            ['name' => 'P.N. Dayaratne', 'bank_id' =>    1771, 'email' => 'prasangi@cbsl.lk'],
            ['name' => 'K. R. Harischandra', 'bank_id' =>    1624, 'email' => 'ranjith@cbsl.lk'],
            ['name' => 'N D Hewapathirana', 'bank_id' =>    1855, 'email' => 'nandun@cbsl.lk'],
            ['name' => 'M. B. R. C. Boralugoda', 'bank_id' =>    1912, 'email' => 'rusiru@cbsl.lk'],
            ['name' => 'D.A.I. Jayasinghe', 'bank_id' =>    1920, 'email' => 'indikaj@cbsl.lk'],
            ['name' => 'C.L.R. Fernando', 'bank_id' =>    1922, 'email' => 'lasith@cbsl.lk'],
            ['name' => 'MTBP Mallawa', 'bank_id' =>    1979, 'email' => 'bhagyam@cbsl.lk'],
            ['name' => 'R.A.R.T  Rupasinghe', 'bank_id' =>    1999, 'email' => 'ruvindee@cbsl.lk'],
            ['name' => 'M T B Ahamed', 'bank_id' =>    3055, 'email' => 'ahamed@cbsl.lk'],
            ['name' => 'O.N.Priyanga', 'bank_id' =>    8014, 'email' => 'nadeesh@cbsl.lk'],
            ['name' => 'C. R. Pathirana', 'bank_id' =>    3067, 'email' => 'roshanp@cbsl.lk'],
            ['name' => 'R. Maldeni', 'bank_id' =>    8049, 'email' => 'rashmi@cbsl.lk'],
            ['name' => 'M. S. Yatigala', 'bank_id' =>    3358, 'email' => 'minushi@cbsl.lk'],
            ['name' => 'S.R. Wijesinghe', 'bank_id' =>    3161, 'email' => 'sajitha@cbsl.lk'],
            ['name' => 'K A L L Sanjaya', 'bank_id' =>    3316, 'email' => 'lhrsanjaya@cbsl.lk'],
            ['name' => 'J H M C B Jayaweera', 'bank_id' =>    3468, 'email' => 'bhanuka@cbsl.lk'],
            ['name' => 'K. P. T. B. Koggalahewa', 'bank_id' =>    8137, 'email' => 'bilesh@cbsl.lk'],
            ['name' => 'S.L. Dasanayake', 'bank_id' =>    8152, 'email' => 'slasith@cbsl.lk'],
            ['name' => 'G H N Saranga', 'bank_id' =>    8165, 'email' => 'ghnsaranga@cbsl.lk'],
            ['name' => 'N. H. A. P. Samaradiwakara', 'bank_id' =>    8171, 'email' => 'nipunas@cbsl.lk'],
            ['name' => 'W A C Kalyana', 'bank_id' =>    3274, 'email' => 'kalyana@cbsl.lk'],
            ['name' => 'M. K. S. D. Fernando', 'bank_id' =>    3309, 'email' => 'sameeradinesh@cbsl.lk'],
            ['name' => 'E. A. Nishani', 'bank_id' =>    3238, 'email' => 'anushkae@cbsl.lk'],
            ['name' => 'M.M Elpitiya', 'bank_id' =>    3272, 'email' => 'madhusika@cbsl.lk'],
            ['name' => 'K. M. S. P. Kasturi', 'bank_id' =>    3209, 'email' => 'prabash@cbsl.lk'],
            ['name' => 'G.A Wickramaratna', 'bank_id' =>    3210, 'email' => 'gayan@cbsl.lk'],
            ['name' => 'M. K. P. L. Viduranga', 'bank_id' =>    3212, 'email' => 'vidura@cbsl.lk'],
            ['name' => 'W.A.U Fernando', 'bank_id' =>    3213, 'email' => 'asiri@cbsl.lk'],
            ['name' => 'B.G.A.L Balasooriya', 'bank_id' =>    3214, 'email' => 'achini@cbsl.lk'],
            ['name' => 'P G N M Polpitigedara', 'bank_id' =>    3544, 'email' => 'nadeera@cbsl.lk'],
            ['name' => 'G D R Perera', 'bank_id' =>    4580, 'email' => 'ranga@cbsl.lk'],
            ['name' => 'U. W. N. N. Uyanwatta', 'bank_id' =>    4630, 'email' => 'uyanwatta@cbsl.lk'],

        ];
        foreach ($users as $user) {
            User::factory()->create([
                'name' => $user['name'],
                'bank_id' => $user['bank_id'],
                'email' => $user['email'],
                'password' => Hash::make('test@1234'),
            ])->assignRole('Guest');
        }
        
        // Asanka
        User::factory()->create([
            'name' => 'Asanka',
            'bank_id' => 3195,
            'email' => 'asankacrk@cbsl.lk',
            'password' => Hash::make('test@1234'),
        ])->assignRole('Admin_Officer');

    }
}
