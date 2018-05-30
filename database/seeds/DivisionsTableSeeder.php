<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            ['id' => '1', 'name' => '開発1', 'department_id' => '1', ],
            ['id' => '2', 'name' => '開発2', 'department_id' => '1', ],
            ['id' => '3', 'name' => '開発3', 'department_id' => '1', ],
            ['id' => '4', 'name' => '開発4', 'department_id' => '1', ],
            ['id' => '5', 'name' => '開発5', 'department_id' => '1', ],
            ['id' => '6', 'name' => '開発部付', 'department_id' => '1', ],
            ['id' => '7', 'name' => '営業1', 'department_id' => '2', ],
            ['id' => '8', 'name' => '営業2', 'department_id' => '2', ],
            ['id' => '9', 'name' => '営業3', 'department_id' => '2', ],
            ['id' => '10', 'name' => '営業4', 'department_id' => '2', ],
            ['id' => '11', 'name' => '営業部付', 'department_id' => '2', ],
            ['id' => '12', 'name' => '総務1', 'department_id' => '3', ],
            ['id' => '13', 'name' => '総務2', 'department_id' => '3', ],
            ['id' => '14', 'name' => '総務3', 'department_id' => '3', ],
            ['id' => '15', 'name' => '総務部付', 'department_id' => '3', ],
            ['id' => '16', 'name' => '人事1', 'department_id' => '4', ],
            ['id' => '17', 'name' => '人事2', 'department_id' => '4', ],
            ['id' => '18', 'name' => '人事部付', 'department_id' => '4', ],
            ['id' => '19', 'name' => '広報1', 'department_id' => '5', ],
            ['id' => '20', 'name' => '広報部付', 'department_id' => '5', ],
            ['id' => '21', 'name' => 'その他', 'department_id' => '6', ],
        ]);
    }
}
