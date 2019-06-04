<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            ['key' => 'slide_1'],
            ['key' => 'slide_2'],
            ['key' => 'slide_3'],
            ['key' => 'slide_4'],
            ['key' => 'slide_5'],
            ['key' => 'slide_6'],
            ['key' => 'slide_7'],
        ]);
    }
}
