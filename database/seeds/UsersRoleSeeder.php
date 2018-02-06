<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array('admin', 'user');
        foreach($roles as $role) {
            DB::table('roles')->insert(
                ['role_name' => $role]
            );
        }
    }
}
