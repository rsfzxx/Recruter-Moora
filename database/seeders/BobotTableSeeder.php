<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BobotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bobots')->insert([
            [
                'kriteria' =>  'C1',
                'keterangan' => 'IPK (S1)',
                'bobot' => '0.25',
                'type' => 'Benefit',
            ],
            [
                'kriteria' =>  'C2',
                'keterangan' => 'Usia',
                'bobot' => '0.10',
                'type' => 'Cost',
            ],
            [
                'kriteria' =>  'C3',
                'keterangan' => 'Pengalaman Kerja',
                'bobot' => '0.20',
                'type' => 'Benefit',
            ],
            [
                'kriteria' =>  'C4',
                'keterangan' => 'Nilai Wawancara',
                'bobot' => '0.15',
                'type' => 'Benefit',
            ],
            [
                'kriteria' =>  'C5',
                'keterangan' => 'Nilai Psikotest',
                'bobot' => '0.15',
                'type' => 'Benefit',
            ],
            [
                'kriteria' =>  'C6',
                'keterangan' => 'Nilai Tes Tertulis',
                'bobot' => '0.15',
                'type' => 'Benefit',
            ]
        ]);
    }
}
