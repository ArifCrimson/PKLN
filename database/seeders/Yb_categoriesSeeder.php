<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\YbCategoryModel;
class Yb_categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['name' => 'AHLI DEWAN NEGARA NEGERI TERENGGANU'],
            ['name' => 'AHLI DEWAN RAKYAT NEGERI TERENGGANU'],
            ['name' => 'AHLI DEWAN UNDANGAN NEGERI TERENGGANU'],
            ['name' => 'AHLI-AHLI MAJLIS MESYUARAT KERAJAAN NEGERI TERENGGANU'],
            ['name' => 'AHLI-AHLI DEWAN PANGKUAN DIRAJA TERENGGANU'],
            ['name' => 'PEGAWAI PENYELARAS DUN'],
        ];

        YbCategoryModel::insert($data);
    }
}
