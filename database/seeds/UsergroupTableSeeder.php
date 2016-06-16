<?php

use Illuminate\Database\Seeder;

class UsergroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usergroups')->insert([
            'name' => 'Super Admin',
        ]);
        DB::table('usergroups')->insert([
            'name' => 'Admin',
        ]);
        DB::table('usergroups')->insert([
            'name' => 'User',
        ]);
    }
}
