<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class stop_travel_types extends Seeder
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
            ['id'=>'1','name_ar' => 'طلب منع السفر','type'=>'stop_travel','name_en'=>'request','slug'=>'stop_travel'],
            ['id'=>'2','name_ar' => 'امر منع السفر','type'=>'stop_travel','name_en'=>'command','slug'=>'stop_travel'],
            ['id'=>'3','name_ar' => ' منع السفر','type'=>'stop_travel','name_en'=>'stop_travel_finished','slug'=>'stop_travel'],
            ['id'=>'4','name_ar' => 'طلب رفع منع السفر','type'=>'stop_travel','name_en'=>'stop_travel_cancel_request','slug'=>'stop_travel'],
            ['id'=>'5','name_ar' => 'رفع منع السفر','type'=>'stop_travel','name_en'=>'stop_travel_cancel','slug'=>'stop_travel'],

        ];

        DB::table('military_affairs_stop_travel_type')->insertOrIgnore($array);


    }
}
