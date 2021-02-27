<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            ['id' => 1,'name' => 'دمشق القديمة','city_id' => 1,'code' => 'OLDDAMAS'],
            ['id' => 2,'name' => 'ساروجة','city_id' => 1,'code' => 'SAROGA'],
            ['id' => 3,'name' => 'القنوات','city_id' => 1,'code' => 'KANOWAT'],
            ['id' => 4,'name' => 'جوبر','city_id' => 1,'code' => 'JOBAR'],
            ['id' => 5, 'name' => 'الميدان','city_id' => 1,'code' => 'MEDAN'],
            ['id' => 6,'name' => 'الشاغور','city_id' => 1,'code' => 'SHAGHOR'],
            ['id' => 7,'name' => 'القدم','city_id' => 1,'code' => 'KADAM'],
            ['id' => 8,'name' => 'كفر سوسة','city_id' => 1,'code' => 'KAFARSOSA'],
            ['id' => 9,'name' => 'المزة','city_id' => 1,'code' => 'MAZA'],
            ['id' => 10,'name' => 'دمر','city_id' => 1,'code' => 'DAMR'],
            ['id' => 11,'name' => 'برزة','city_id' => 1,'code' => 'BARZA'],
            ['id' => 12,'name' => 'القابون','city_id' => 1,'code' => 'KABON'],
            ['id' => 13,'name' => 'ركن الدين','city_id' => 1,'code' => 'ROKNALDEEN'],
            ['id' => 14,'name' => 'الصالحية','city_id' => 1,'code' => 'SALEHEA'],
            ['id' => 15,'name' => 'المهاجرين','city_id' => 1,'code' => 'MHAJREEN'],
            // areas ref damas
            ['id' => 16,'name' => 'دوما','city_id' => 12,'code' => 'DOMA'],
            ['id' => 17,'name' => 'يبرود','city_id' => 12,'code' => 'EABROD'],
            ['id' => 18,'name' => 'النبك','city_id' => 12,'code' => 'NABEK'],
            ['id' => 19,'name' => 'التل','city_id' => 12,'code' => 'TAL'],
            ['id' => 20,'name' => 'القطيفة','city_id' => 12,'code' => 'KOTEFA'],
            ['id' => 21,'name' => 'الزبداني','city_id' => 12,'code' => 'ZABADANE'],
            ['id' => 22,'name' => 'ريف دمشق','city_id' => 12,'code' => 'REFDAMAS'],
            ['id' => 23,'name' => 'قطنا','city_id' => 12,'code' => 'KATANA'],
            ['id' => 24,'name' => 'داريا','city_id' => 12,'code' => 'DARAYA'],
        ];
        DB::table('areas')->insert($areas);
    }
}
