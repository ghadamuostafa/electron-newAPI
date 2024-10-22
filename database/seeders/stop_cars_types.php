<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class stop_cars_types extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = [
            ['id'=>'1','name_ar' => 'طلب  الحجز','type'=>'stop_car','name_en'=>'stop_car_request','slug'=>'stop_car'],
            ['id'=>'2','name_ar' => '  المرور','type'=>'stop_car','name_en'=>'stop_car_info','slug'=>'stop_car'],
            ['id'=>'3','name_ar' => '  المديرية','type'=>'stop_car','name_en'=>'stop_car_police','slug'=>'stop_car'],
            ['id'=>'4','name_ar' => '  القيادة ','type'=>'stop_car','name_en'=>'stop_car_catch','slug'=>'stop_car'],
            ['id'=>'5','name_ar' => '  مخفر','type'=>'stop_car','name_en'=>'stop_car_police_station','slug'=>'stop_car'],
            ['id'=>'6','name_ar' => '  بانتظار الحجز','type'=>'stop_car','name_en'=>'stop_car_doing','slug'=>'stop_car'],
            ['id'=>'7','name_ar' => '  تم الحجز','type'=>'stop_car','name_en'=>'stop_car_finished','slug'=>'stop_car'],
            ['id'=>'8','name_ar' => '  طلب رفع الحجز','type'=>'stop_car','name_en'=>'stop_car_cancel_request','slug'=>'stop_car'],
            ['id'=>'9','name_ar' => '  رفع الحجز','type'=>'stop_car','name_en'=>'stop_car_cancel','slug'=>'stop_car'],

        ];

        DB::table('military_affairs_stop_car_type')->insertOrIgnore($array);

    }
}
