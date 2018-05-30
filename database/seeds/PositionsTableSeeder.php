<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            ['id' => '1', 'name' => '社長', ],
            ['id' => '2', 'name' => '部長', ],
            ['id' => '3', 'name' => '課長', ],
            ['id' => '4', 'name' => 'リーダー', ],
            ['id' => '5', 'name' => 'メンバ', ],
        ]);
    }
}
