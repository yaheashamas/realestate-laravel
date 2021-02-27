<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['id' => 1,'name' => 'دمشق','code' => 'DAMAS'],
            ['id' => 2,'name' => 'حلب','code' => 'HALAB'],
            ['id' => 3,'name' => 'درعا','code' => 'DARA'],
            ['id' => 4,'name' => 'دير الزور','code' => 'DERALZOR'],
            ['id' => 5, 'name' => 'حماة','code' => 'HAMA'],
            ['id' => 6,'name' => 'الحسكة','code' => 'HASAKA'],
            ['id' => 7,'name' => 'حمص','code' => 'HOMS'],
            ['id' => 8,'name' => 'ادلب','code' => 'ADLEB'],
            ['id' => 9,'name' => 'اللادقية','code' => 'LAZEKEA'],
            ['id' => 10,'name' => 'القنيطرة','code' => 'KONETA'],
            ['id' => 11,'name' => 'الرقة','code' => 'REKA'],
            ['id' => 12,'name' => 'ريف دمشق','code' => 'REFDAMAS'],
            ['id' => 13,'name' => 'السويداء','code' => 'SOEDAH'],
            ['id' => 14,'name' => 'طرطوس','code' => 'TARTOS'],
        ];
        DB::table('cities')->insert($cities);
    }
}
