<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PanggilanModel;

class PanggilanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['name'=>'CIK'],
            ['name'=>'TUAN'],
            ['name'=>'PUAN'],
            ['name'=>'DATUK'],
            ['name'=>'DATO\''],
            ['name'=>'TAN SRI'],
            ['name'=>'TUAN HAJI'],
            ['name'=>'YAB'],
            ['name'=>'YAB DR.'],
            ['name'=>'YM'],
            ['name'=>'YB'],
            ['name'=>'YBRS.'],
            ['name'=>'YB DATO'],
            ['name'=>'YBHG. DATO\' DR. HAJI'],
            ['name'=>'TOH PUAN'],
            ['name'=>'DATIN SRI'],
            ['name'=>'ENCIK'],
            ['name'=>'YB SENATOR'],
            ['name'=>'YB SENATOR DATO'],
            ['name'=>'YAB DATO\' SERI'],
            ['name'=>'YB DATO\' SERI'],
            ['name'=>'TPR. GS.'],
            ['name'=>'TPR.'],
            ['name'=>'USTAZ'],
            ['name'=>'IR.'],
            ['name'=>'DR.'],
            ['name'=>'PUAN HAJAH'],
            ['name'=>'YBHG. DR.'],
            ['name'=>'YBHG. DATO'],
            ['name'=>'DULI YANG TERAMAT MULIA'],
            ['name'=>'YBM'],
            ['name'=>'PPJB'],
            ['name'=>'LT. KOL. BERSEKUTU (PA)'],
            ['name'=>'YBHG. PROF.'],
            ['name'=>'PROF.'],
            ['name'=>'YDH. DCP'],
            ['name'=>'LT.KOL.'],
            ['name'=>'LEFTENAN KOLONEL'],
            ['name'=>'PPJKR'],
            ['name'=>'KAPTEN MARITIM'],
            ['name'=>'ACP'],
            ['name'=>'SUPT.'],
            ['name'=>'DSP'],
            ['name'=>'SUPT.'],
            ['name'=>'TKP'],
            ['name'=>'Y.A.'],
            ['name'=>'P/SUPT'],
            ['name'=>'ASP'],
            ['name'=>'YBRA. PROF MADYA DR.'],
            ['name'=>'YBHG. PROFESOR MADYA DR.'],
            ['name'=>'YAA TUAN HAJI'],
            ['name'=>'KPKPJ'],
            ['name'=>'YBHG.'],
            ['name'=>'-'],
            ['name'=>'TS.'],
            ['name'=>'YH'],
            ['name'=>'SAC'],
        ];

        PanggilanModel::insert($data);
    }
}
