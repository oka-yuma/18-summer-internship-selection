<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['id' => '1', 'name' => '開発', ],
            ['id' => '2', 'name' => '営業', ],
            ['id' => '3', 'name' => '総務', ],
            ['id' => '4', 'name' => '人事', ],
            ['id' => '5', 'name' => '広報', ],
            ['id' => '6', 'name' => 'その他', ],
        ]);
    }
}
