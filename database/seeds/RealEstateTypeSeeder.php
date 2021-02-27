<?php

use Illuminate\Database\Seeder;

class RealEstateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            ['id' => 1,'name'=>'بيت','code'=>'HOME'],
            ['id' => 2,'name'=>'محل','code'=>'SHOP'],
            ['id' => 3,'name'=>'ارض','code'=>'LAND'],
        ];
        DB::table('real_estate_types')->insert($type);
    }
}
