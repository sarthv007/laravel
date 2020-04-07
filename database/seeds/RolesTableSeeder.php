<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            	'role' => 'admin',
	        ],
	    	[
	            'role' => 'hod',
	        ],
	        [
	            'role' => 'principal',
	        ],
	        [
	            'role' => 'teachers',
	        ]
	    ]);
    }
}
