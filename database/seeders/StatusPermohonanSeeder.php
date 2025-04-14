<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StatusPermohonanModel;

class StatusPermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['name' => 'PERMOHONAN DILULUSKAN'],
            ['name' => 'PERMOHONAN DIHANTAR'],
            ['name' => 'PERMOHONAN SEDANG DIPROSES'],
            ['name' => 'PERMOHONAN BATAL'],
        ];

        StatusPermohonanModel::insert($data);

    }
}
