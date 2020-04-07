<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('departments')->insert([[
            'name' => 'IT',
        ],
    	[
            'name' => 'Mechanical',
        ],
        [
            'name' => 'Chemical',
        ],
        [
            'name' => 'Entc',
        ],
        [
            'name' => 'Civil',
        ]
    ]);
    }
}
