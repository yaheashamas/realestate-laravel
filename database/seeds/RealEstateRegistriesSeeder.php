<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealEstateRegistriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registries = [
            ['id' => 1,'name'=>'طابو اخضر','code'=>'TABOGREEB'],
            ['id' => 2,'name'=>'سجل مؤقت','code'=>'SAGELMOAKAT'],
            ['id' => 3,'name'=>'حكم محكمة','code'=>'HKMMHKAMA'],
            ['id' => 4,'name'=>'طابو زراعي','code'=>'TABOZRAE'],
            ['id' => 5,'name'=>'كاتب بالعدل','code'=>'KATEBADELD'],
            ['id' => 6,'name'=>'اسهم','code'=>'ASHOM'],
            ['id' => 7,'name'=>'املاك دولة','code'=>'AMLAKDOLA'],
        ];
        DB::table('real_estate_registries')->insert($registries);
    }
}
