<?php

namespace Database\Seeders;

use App\Models\M_Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EduEqualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@eduequal.test'],
            [
                'name' => 'Admin EduEqual',
                'password' => Hash::make('Admin12345!'),
                'role' => 'admin',
            ]
        );

        // Data awal mata pelajaran
        $subjects = [
            'Matematika',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'IPA',
            'IPS',
        ];

        foreach ($subjects as $subject) {
            M_Subject::firstOrCreate([
                'nama' => $subject,
            ]);
        }
    }
}
